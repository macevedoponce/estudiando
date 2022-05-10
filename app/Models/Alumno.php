<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $id
 * @property $aluDni
 * @property $aluNombres
 * @property $aluApellidoPaterno
 * @property $aluApellidoMaterno
 * @property $aluPassword
 * @property $created_at
 * @property $updated_at
 *
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    static $rules = [
		'aluDni' => 'required',
		'aluNombres' => 'required',
		'aluApellidoPaterno' => 'required',
		'aluApellidoMaterno' => 'required',
		'aluPassword' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['aluDni','aluNombres','aluApellidoPaterno','aluApellidoMaterno','aluPassword'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany('App\Models\Matricula', 'aluId', 'id');
    }
    

}
