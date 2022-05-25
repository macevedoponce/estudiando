<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dethorario
 *
 * @property $horId
 * @property $curId
 * @property $created_at
 * @property $updated_at
 *
 * @property Horario $horario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * 
 * @property Curso $curso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dethorario extends Model
{
    
    static $rules = [
       // 'dia' => 'required',
		//'hora_inicio' => 'required',
        //'hora_fin' => 'required',
        'horario' => 'required',
		'curId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    //protected $fillable = ['dia','hora_inicio','hora_fin','curId'];
    protected $fillable = ['horario','curId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'curId');
    }
    

}
