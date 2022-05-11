<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $curNombre
 * @property $docId
 * @property $graId
 * @property $secId
 * @property $created_at
 * @property $updated_at
 *
 * @property Dethorario[] $dethorarios
 * @property Docente $docente
 * @property Grado $grado
 * @property Seccion $seccion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    static $rules = [
        'curCodigo' => 'required',
		'curNombre' => 'required',
		'docId' => 'required',
		'graId' => 'required',
		'secId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['curCodigo','curNombre','docId','graId','secId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dethorarios()
    {
        return $this->hasMany('App\Models\Dethorario', 'curId', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'docId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'graId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seccion()
    {
        return $this->hasOne('App\Models\Seccion', 'id', 'secId');
    }
    

}
