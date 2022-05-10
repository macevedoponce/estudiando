<?php

namespace App\Imports;

use App\Models\Docente;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class DocentesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //
        return new Docente([
            'docDni'     => $row[0],
            'docNombres'    => $row[1], 
            'docApellidoPaterno'    => $row[2], 
            'docApellidoMaterno'    => $row[3], 
            'docPassword' => Hash::make($row[4]),
         ]);
    }
}
