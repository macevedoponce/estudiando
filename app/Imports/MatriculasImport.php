<?php

namespace App\Imports;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Seccion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class MatriculasImport implements ToModel, WithBatchInserts, WithChunkReading, WithValidation
{
    private $alumnos, $grados, $secciones,$prueba;
    public function __construct(){
        $this->alumnos = Alumno::pluck('id','aluDni');
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
        return new Matricula([
            //
            
            'aluId'    => $this->alumnos[$row['0']],
            'graId'    => $this->grados[$row['1']],
            'secId'    => $this->secciones[$row['2']],
            'matPeriodo'    => $row[3]
         ]);
    }
    public function rules(): array
    {
        return [
            
            '*.0' => ['required'],
            '*.1' => ['required'],
            '*.2' => ['required'],
            '*.3' => ['required','unique:matriculas,matPeriodo'],
             
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.0.required' => 'El DNI del alumno es requerido',
            '*.3.unique' => 'El DNI del alumno ya fue registrado anteriormente',
            '*.1.required' => 'El Grado es requerido',
            '*.2.required' => 'La seccion es requerido',
            '*.3.required' => 'El periodo es requerido',
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
