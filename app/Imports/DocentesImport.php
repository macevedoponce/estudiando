<?php

namespace App\Imports;

use App\Models\Docente;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
/*
prueba
*/

use Maatwebsite\Excel\Concerns\WithProgressBar;
/*
fin
prueba
*/
class DocentesImport implements ToModel, WithValidation,WithProgressBar
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
   
    public function rules(): array
    {
        return [
            
            '*.0' => ['required','max:8' ,'min:8', 'unique:docentes,docDni'],
            '*.1' => ['required','string',],
            '*.2' => [ 'required', 'string',],
            '*.3' => [ 'required', 'string',],
            '*.4' => [ 'required','string', ],
             
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.0.required' => 'El Dni es requerido',
            '*.0.max' => 'El Dni solo tiene 8 caracteres',
            '*.0.unique' => 'El Dni ya fue registrado anteriormente',
            '*.1.required' => 'Los nombres son requeridos',
            '*.2.required' => 'El Apellido Paterno es requerido',
            '*.3.required' => 'El Apellido Materno es requerido',
            '*.4.required' => 'La Contraseña es requerida',
        ];
    }
 
}
