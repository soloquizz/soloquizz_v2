<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Classe
 * @package App\Models\Administration
 * @version June 11, 2023, 11:40 pm UTC
 *
 * @property \App\Models\Administration\Domaine $domaine
 * @property \App\Models\Administration\Niveau $niveaux
 * @property \App\Models\Administration\Parcour $parcour
 * @property \Illuminate\Database\Eloquent\Collection $inscriptions
 * @property string $nom
 * @property integer $parcour_id
 * @property integer $domaine_id
 * @property integer $niveau_id
 */
class Classe extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'classes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'parcour_id',
        'domaine_id',
        'niveau_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'parcour_id' => 'integer',
        'domaine_id' => 'integer',
        'niveau_id' => 'integer'
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
        'deleted_at' => 'nullable',
        'parcour_id' => 'required',
        'domaine_id' => 'required',
        'niveau_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function domaine()
    {
        return $this->belongsTo(\App\Models\Administration\Domaine::class, 'domaine_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function niveau()
    {
        return $this->belongsTo(\App\Models\Administration\Niveau::class, 'niveau_id');
    }

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
    public function inscriptions()
    {
        return $this->hasMany(\App\Models\Administration\Inscription::class, 'classe_id');
    }
}
