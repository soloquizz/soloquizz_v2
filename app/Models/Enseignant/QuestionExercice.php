<?php

namespace App\Models\Enseignant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class QuestionExercice
 * @package App\Models\Enseignant
 * @version July 21, 2023, 10:40 am UTC
 *
 * @property \App\Models\Enseignant\Exercice $exercice
 * @property \App\Models\Enseignant\QuestionCours $questionCours
 * @property integer $question_cours_id
 * @property integer $exercice_id
 * @property integer $point
 * @property integer $duree
 */
class QuestionExercice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'question_exercices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'question_cours_id',
        'exercice_id',
        'point',
        'duree'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question_cours_id' => 'integer',
        'exercice_id' => 'integer',
        'point' => 'integer',
        'duree' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question_cours_id' => 'required',
        'exercice_id' => 'required',
        'point' => 'nullable|integer',
        'duree' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function exercice()
    {
        return $this->belongsTo(\App\Models\Enseignant\Exercice::class, 'exercice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function questionCours()
    {
        return $this->belongsTo(\App\Models\Enseignant\QuestionCours::class, 'question_cours_id');
    }
}
