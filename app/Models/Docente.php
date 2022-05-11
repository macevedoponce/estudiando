<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Docente
 *
 * @property $id
 * @property $docDni
 * @property $docNombres
 * @property $docApellidoPaterno
 * @property $docApellidoMaterno
 * @property $docPassword
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso[] $cursos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Docente extends Model
{
    
    static $rules = [
		'docDni' => 'required',
		'docNombres' => 'required',
		'docApellidoPaterno' => 'required',
		'docApellidoMaterno' => 'required',
		'docPassword' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['docDni','docNombres','docApellidoPaterno','docApellidoMaterno','docPassword'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursos()
    {
        return $this->hasMany('App\Models\Curso', 'docId', 'id');
    }

}
