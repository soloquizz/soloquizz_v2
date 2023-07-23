<?php

namespace App\Models\Enseignant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class QuestionCours
 * @package App\Models\Enseignant
 * @version July 18, 2023, 12:18 pm UTC
 *
 * @property \App\Models\Enseignant\Cour $cours
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestionCours
 * @property \Illuminate\Database\Eloquent\Collection $optionCours
 * @property \Illuminate\Database\Eloquent\Collection $questionEvaluations
 * @property \Illuminate\Database\Eloquent\Collection $questionExercices
 * @property string $contenu
 * @property boolean $qcm
 * @property integer $cours_id
 */
class QuestionCours extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'question_cours';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contenu',
        'qcm',
        'cours_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contenu' => 'string',
        'qcm' => 'boolean',
        'cours_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contenu' => 'required|string',
        'qcm' => 'required|boolean',
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
        return $this->belongsTo(\App\Models\Enseignant\Cour::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantQuestionCours()
    {
        return $this->hasMany(\App\Models\Enseignant\EtudiantQuestionCour::class, 'question_cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function optionCours()
    {
        return $this->hasMany(\App\Models\Enseignant\OptionCour::class, 'question_cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionEvaluations()
    {
        return $this->hasMany(\App\Models\Enseignant\QuestionEvaluation::class, 'question_cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionExercices()
    {
        return $this->hasMany(\App\Models\Enseignant\QuestionExercice::class, 'question_cours_id');
    }
}
