<?php

namespace App\Imports;

use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class AlumnosImport implements ToModel, WithValidation
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

    public function rules(): array
    {
        return [
            
            '*.0' => ['required','max:8' ,'min:8', 'unique:alumnos,aluDni'],
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
