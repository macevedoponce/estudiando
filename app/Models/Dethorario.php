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
 */
class Dethorario extends Model
{
    
    static $rules = [
		'horId' => 'required',
		'curId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['horId','curId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function horario()
    {
        return $this->hasOne('App\Models\Horario', 'id', 'horId');
    }
    

}
