<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Niveau
 * @package App\Models\Administration
 * @version June 11, 2023, 11:39 pm UTC
 *
 * @property \App\Models\Administration\Parcour $parcour
 * @property \Illuminate\Database\Eloquent\Collection $certifications
 * @property \Illuminate\Database\Eloquent\Collection $classes
 * @property string $nom
 * @property integer $annee
 * @property integer $parcour_id
 */
class Niveau extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'niveaux';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'annee',
        'parcour_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'annee' => 'integer',
        'parcour_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:255',
        'annee' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'parcour_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parcour()
    {
        return $this->belongsTo(\App\Models\Administration\Parcours::class, 'parcour_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certifications()
    {
        return $this->hasMany(\App\Models\Administration\Certification::class, 'niveau_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function classes()
    {
        return $this->hasMany(\App\Models\Administration\Classe::class, 'niveau_id');
    }
}
