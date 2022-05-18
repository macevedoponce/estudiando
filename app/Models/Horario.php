<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 *
 * @property $id
 * @property $horDia
 * @property $horInicio
 * @property $horFin
 * @property $created_at
 * @property $updated_at
 *
 * @property Dethorario[] $dethorarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Horario extends Model
{
    
    static $rules = [
		'horInicio' => 'required',
		'horFin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['horInicio','horFin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dethorarios()
    {
        return $this->hasMany('App\Models\Dethorario', 'horId', 'id');
    }
    

}
