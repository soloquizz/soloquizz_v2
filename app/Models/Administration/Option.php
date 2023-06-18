<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Option
 * @package App\Models\Administration
 * @version June 17, 2023, 11:23 am UTC
 *
 * @property \App\Models\Administration\Question $question
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestions
 * @property string $contenu
 * @property boolean $correcte
 * @property integer $question_id
 */
class Option extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'options';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contenu',
        'correcte',
        'question_id'
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
        'question_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contenu' => 'required|string',
        'correcte' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'question_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function question()
    {
        return $this->belongsTo(\App\Models\Administration\Question::class, 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantQuestions()
    {
        return $this->hasMany(\App\Models\Administration\EtudiantQuestion::class, 'option_id');
    }
}
