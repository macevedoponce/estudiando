<?php

namespace App\Imports;

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Grado;
use App\Models\Seccion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CursosImport implements ToModel, WithBatchInserts, WithChunkReading
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
        return new Curso([
            'curNombre'=> $row[0],
            'docId'    => $this->docentes[$row['1']],
            'graId'    => $this->grados[$row['2']],
            'secId'    => $this->secciones[$row['3']]
         ]);
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
