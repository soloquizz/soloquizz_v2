<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EtudiantQuestion
 * @package App\Models\Administration
 * @version June 25, 2023, 12:16 pm UTC
 *
 * @property \App\Models\Administration\Certification $certification
 * @property \App\Models\Administration\Dump $dump
 * @property \App\Models\Administration\Etudiant $etudiant
 * @property \App\Models\Administration\Option $option
 * @property \App\Models\Administration\Question $question
 * @property \App\Models\Administration\User $user
 * @property integer $etudiant_id
 * @property integer $user_id
 * @property integer $question_id
 * @property integer $dump_id
 * @property integer $option_id
 * @property boolean $trouve
 * @property integer $certification_id
 */
class EtudiantQuestion extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'etudiant_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etudiant_id',
        'user_id',
        'question_id',
        'dump_id',
        'option_id',
        'trouve',
        'certification_id',
        'dump_user_id',
        'dump_user_question_id'
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
        'question_id' => 'integer',
        'dump_id' => 'integer',
        'option_id' => 'integer',
        'trouve' => 'boolean',
        'certification_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etudiant_id' => 'nullable',
        'user_id' => 'required',
        'question_id' => 'required',
        'dump_id' => 'required',
        'option_id' => 'required',
        'trouve' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'certification_id' => 'required'
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
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\Administration\Etudiant::class, 'etudiant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function option()
    {
        return $this->belongsTo(\App\Models\Administration\Option::class, 'option_id');
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
}
