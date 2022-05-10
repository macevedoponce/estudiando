<?php

namespace App\Imports;

use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            //
            'aluDni'     => $row[0],
            'aluNombres'    => $row[1], 
            'aluApellidoPaterno'    => $row[2], 
            'aluApellidoMaterno'    => $row[3], 
            'aluPassword' => Hash::make($row[4]),
        ]);
    }
}
