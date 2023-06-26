<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DumpUser
 * @package App\Models\Administration
 * @version June 25, 2023, 12:02 pm UTC
 *
 * @property \App\Models\Administration\Dump $dump
 * @property \App\Models\Administration\Etudiant $etudiant
 * @property \App\Models\Administration\User $user
 * @property integer $etudiant_id
 * @property integer $dump_id
 * @property integer $user_id
 * @property boolean $etat
 * @property integer $score
 */
class DumpUser extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dump_users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etudiant_id',
        'dump_id',
        'user_id',
        'etat',
        'score',
        'question_true',
        'question_false',
        'certification_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etudiant_id' => 'integer',
        'dump_id' => 'integer',
        'user_id' => 'integer',
        'etat' => 'boolean',
        'score' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etudiant_id' => 'nullable',
        'dump_id' => 'required',
        'user_id' => 'required',
        'etat' => 'required|boolean',
        'score' => 'required|integer',
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
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\Administration\Etudiant::class, 'etudiant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Administration\User::class, 'user_id');
    }

    public function dumpuserQuestions()
    {
        return $this->hasMany(\App\Models\Administration\DumpUserQuestion::class, 'dump_user_id');
    }

}
