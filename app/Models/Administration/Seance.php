<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Seance
 * @package App\Models\Administration
 * @version July 9, 2023, 10:38 pm UTC
 *
 * @property \App\Models\Administration\Cour $cours
 * @property \App\Models\Administration\Enseignant $enseignant
 * @property \Illuminate\Database\Eloquent\Collection $exercices
 * @property string $titre
 * @property string $date
 * @property string $heure_debut
 * @property string $heure_fin
 * @property integer $duree
 * @property integer $cours_id
 * @property integer $enseignant_id
 */
class Seance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'seances';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'date',
        'heure_debut',
        'heure_fin',
        'duree',
        'cours_id',
        'enseignant_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'date' => 'date',
        'heure_debut' => 'string',
        'heure_fin' => 'string',
        'duree' => 'integer',
        'cours_id' => 'integer',
        'enseignant_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required|string|max:191',
        'date' => 'required',
        'heure_debut' => 'required|string|max:191',
        'heure_fin' => 'required|string|max:191',
        'duree' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'cours_id' => 'required',
        'enseignant_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cours()
    {
        return $this->belongsTo(\App\Models\Administration\Cour::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function enseignant()
    {
        return $this->belongsTo(\App\Models\Administration\Enseignant::class, 'enseignant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function exercices()
    {
        return $this->hasMany(\App\Models\Administration\Exercice::class, 'seance_id');
    }
}
