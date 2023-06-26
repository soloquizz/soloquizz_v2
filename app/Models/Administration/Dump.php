<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dump
 * @package App\Models\Administration
 * @version June 25, 2023, 11:49 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $dumpQuestions
 * @property \Illuminate\Database\Eloquent\Collection $dumpUsers
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestions
 * @property string $titre
 * @property integer $score
 * @property integer $duree
 */
class Dump extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dumps';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'score',
        'duree',
        'certification_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'score' => 'integer',
        'duree' => 'integer',
        'certification_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required|string|max:255',
        'score' => 'required|integer',
        'duree' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dumpQuestions()
    {
        return $this->hasMany(\App\Models\Administration\DumpQuestion::class, 'dump_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dumpUsers()
    {
        return $this->hasMany(\App\Models\Administration\DumpUser::class, 'dump_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantQuestions()
    {
        return $this->hasMany(\App\Models\Administration\EtudiantQuestion::class, 'dump_id');
    }

    public function certification()
    {
        return $this->belongsTo(\App\Models\Administration\Certification::class, 'certification_id');
    }
}
