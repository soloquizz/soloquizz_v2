<?php

namespace App\Models\Enseignant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Evaluations
 * @package App\Models\Enseignant
 * @version August 4, 2023, 9:46 am UTC
 *
 * @property \App\Models\Administration\Cours $cours
 * @property \Illuminate\Database\Eloquent\Collection $etudiantEvaluations
 * @property \Illuminate\Database\Eloquent\Collection $evaluationExercices
 * @property \Illuminate\Database\Eloquent\Collection $questionEvaluations
 * @property string $titre
 * @property string $type
 * @property integer $note_max
 * @property string $date
 * @property string $heure
 * @property string $duree
 * @property boolean $etat
 * @property integer $cours_id
 */
class Evaluations extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'evaluations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'type',
        'note_max',
        'date',
        'heure',
        'duree',
        'etat',
        'cours_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'type' => 'string',
        'note_max' => 'integer',
        'date' => 'date',
        'heure' => 'datetime:H:i',
        'duree' => 'integer',
        'etat' => 'boolean',
        'cours_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required|string|max:191',
        'type' => 'required|string',
        'note_max' => 'required|integer',
        'date' => 'required',
        'heure' => 'required',
        'duree' => 'required|integer',
        'etat' => 'required|boolean|nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'cours_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cours()
    {
        return $this->belongsTo(\App\Models\Administration\Cours::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantEvaluations()
    {
        return $this->hasMany(\App\Models\Enseignant\EtudiantEvaluation::class, 'evaluation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function evaluationExercices()
    {
        return $this->hasMany(\App\Models\Enseignant\EvaluationExercice::class, 'evaluation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionEvaluations()
    {
        return $this->hasMany(\App\Models\Enseignant\QuestionEvaluation::class, 'evaluation_id');
    }
}
