<?php

namespace App\Imports;

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Grado;
use App\Models\Seccion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class CursosImport implements ToModel, WithBatchInserts, WithChunkReading, WithValidation
{

    private $docentes, $grados, $secciones;
    public function __construct(){
        $this->docentes = Docente::pluck('id','docDni');
        $this->grados = Grado::pluck('id','graNombre');
        $this->secciones = Seccion::pluck('id','secNombre');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // VERIFICAR QUE LOS DOCENTES ESTEN REGISTRADOS, GRADOS, SECCIONES
        return new Curso([
            'curNombre'=> $row[0],
            'docId'    => $this->docentes[$row['1']],
            'graId'    => $this->grados[$row['2']],
            'secId'    => $this->secciones[$row['3']]
         ]);
    }
    public function rules(): array
    {
        return [
            
            '*.0' => ['required','string', 'unique:cursos,curNombre'],
            '*.1' => ['required',],
            '*.2' => [ 'required', ],
            '*.3' => [ 'required', ],
             
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.0.required' => 'El Nombre del curso es requerido',
            '*.0.unique' => 'El Nombre del curso ya fue registrado anteriormente',
            '*.1.required' => 'El DNI del docente es requerido',
            '*.2.required' => 'El Grado Paterno es requerido',
            '*.3.required' => 'La Seccion es requerido',
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }
}
