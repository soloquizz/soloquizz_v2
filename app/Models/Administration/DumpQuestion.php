<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DumpQuestion
 * @package App\Models\Administration
 * @version June 25, 2023, 11:56 am UTC
 *
 * @property \App\Models\Administration\Dump $dump
 * @property \App\Models\Administration\Question $question
 * @property integer $dump_id
 * @property integer $question_id
 */
class DumpQuestion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dump_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dump_id',
        'question_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dump_id' => 'integer',
        'question_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dump_id' => 'required',
        'question_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

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
}
