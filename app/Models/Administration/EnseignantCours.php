<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EnseignantCours
 * @package App\Models\Administration
 * @version July 8, 2023, 7:26 pm UTC
 *
 * @property \App\Models\Administration\AnneeScolaire $anneeScolaire
 * @property \App\Models\Administration\Cour $cours
 * @property \App\Models\Administration\Enseignant $enseignant
 * @property integer $enseignant_id
 * @property integer $cours_id
 * @property integer $annee_scolaire_id
 */
class EnseignantCours extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'enseignant_cours';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'enseignant_id',
        'cours_id',
        'annee_scolaire_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enseignant_id' => 'integer',
        'cours_id' => 'integer',
        'annee_scolaire_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'enseignant_id' => 'required',
        'cours_id' => 'required',
        'annee_scolaire_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anneeScolaire()
    {
        return $this->belongsTo(\App\Models\Administration\AnneeScolaire::class, 'annee_scolaire_id');
    }

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
}
