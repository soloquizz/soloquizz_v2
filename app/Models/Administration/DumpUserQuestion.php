<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DumpUserQuestion
 * @package App\Models\Administration
 * @version June 26, 2023, 12:47 am UTC
 *
 * @property \App\Models\Administration\Certification $certification
 * @property \App\Models\Administration\Dump $dump
 * @property \App\Models\Administration\Question $question
 * @property \App\Models\Administration\User $user
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestions
 * @property integer $user_id
 * @property integer $question_id
 * @property integer $dump_id
 * @property integer $certification_id
 */
class DumpUserQuestion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dump_user_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'question_id',
        'dump_id',
        'certification_id',
        'dump_user_id',
        'trouve'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'question_id' => 'integer',
        'dump_id' => 'integer',
        'certification_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'question_id' => 'required',
        'dump_id' => 'required',
        'certification_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function certification()
    {
        return $this->belongsTo(\App\Models\Administration\Certification::class, 'certification_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dump()
    {
        return $this->belongsTo(\App\Models\Administration\Dump::class, 'dump_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function question()
    {
        return $this->belongsTo(\App\Models\Administration\Question::class, 'question_id');
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
    public function etudiantQuestions()
    {
        return $this->hasMany(\App\Models\Administration\EtudiantQuestion::class, 'dump_user_question_id');
    }
}
