<?php

namespace App\Models\Enseignant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OptionCour
 * @package App\Models\Enseignant
 * @version July 31, 2023, 4:45 pm UTC
 *
 * @property \App\Models\Enseignant\QuestionCour $questionCours
 * @property string $contenu
 * @property boolean $correcte
 * @property integer $question_cours_id
 */
class OptionCour extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'option_cours';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contenu',
        'correcte',
        'question_cours_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contenu' => 'string',
        'correcte' => 'boolean',
        'question_cours_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contenu' => 'required|string|max:191',
        'correcte' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'question_cours_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function questionCours()
    {
        return $this->belongsTo(\App\Models\Enseignant\QuestionCour::class, 'question_cours_id');
    }
}
