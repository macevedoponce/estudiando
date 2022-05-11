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
            'curCodigo'=> $row[0],
            'curNombre'=> $row[1],
            'docId'    => $this->docentes[$row['2']],
            'graId'    => $this->grados[$row['3']],
            'secId'    => $this->secciones[$row['4']]
         ]);
    }
    public function rules(): array
    {
        return [
            
            '*.0' => ['required','string','max:7','min:7','unique:cursos,curCodigo'],
            '*.1' => ['required','string'],
            '*.2' => ['required',],
            '*.3' => [ 'required', ],
            '*.4' => [ 'required', ],
             
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.0.required' => 'El Codigo del curso es requerido',
            '*.0.max'=>'El codigo del curso tiene 7 caracteres maximo',
            '*.0.min'=>'El codigo del curso tiene 7 caracteres minimo',
            '*.0.unique' => 'El Codigo del curso ya fue registrado anteriormente',
            '*.1.required' => 'El Nombre del curso es requerido',
            '*.2.required' => 'El DNI del docente es requerido',
            '*.3.required' => 'El Grado Paterno es requerido',
            '*.4.required' => 'La Seccion es requerido',
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
