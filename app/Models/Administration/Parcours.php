<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Parcours
 * @package App\Models\Administration
 * @version June 11, 2023, 11:35 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $classes
 * @property \Illuminate\Database\Eloquent\Collection $niveaux
 * @property string $nom
 */
class Parcours extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'parcours';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function classes()
    {
        return $this->hasMany(\App\Models\Administration\Class::class, 'parcour_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function niveaux()
    {
        return $this->hasMany(\App\Models\Administration\Niveau::class, 'parcour_id');
    }
}
