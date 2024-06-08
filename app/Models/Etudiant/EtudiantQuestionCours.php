<?php

namespace App\Models\Etudiant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EtudiantQuestionCours
 * @package App\Models\Etudiant
 * @version August 8, 2023, 1:23 pm UTC
 *
 * @property \App\Models\Administration\Etudiant $etudiant
 * @property \App\Models\Enseignant\QuestionCours $questionCours
 * @property \App\Models\Administration\User $user
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestionCoursOptions
 * @property integer $etudiant_id
 * @property integer $user_id
 * @property integer $question_cours_id
 * @property boolean $trouve
 */
class EtudiantQuestionCours extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'etudiant_question_cours';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etudiant_id',
        'user_id',
        'question_cours_id',
        'trouve',
        'contenu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etudiant_id' => 'integer',
        'user_id' => 'integer',
        'question_cours_id' => 'integer',
        'trouve' => 'boolean',
        'contenu'=>'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etudiant_id' => 'nullable',
        'user_id' => 'required',
        'question_cours_id' => 'required',
        'trouve' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'contenu'=>'string|required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\Administration\Etudiant::class, 'etudiant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function questionCours()
    {
        return $this->belongsTo(\App\Models\Enseignant\QuestionCours::class, 'question_cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Administration\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantQuestionCoursOptions()
    {
        return $this->hasMany(\App\Models\Etudiant\EtudiantQuestionCoursOption::class, 'etud_quest_cours_id');
    }
}
