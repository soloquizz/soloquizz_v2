<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Question
 * @package App\Models\Administration
 * @version June 12, 2023, 4:35 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $dumpQuestions
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestions
 * @property string $contenu
 * @property integer $point
 * @property integer $duree
 */
class Question extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'contenu',
        'point',
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
        'contenu' => 'string',
        'point' => 'integer',
        'duree' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contenu' => 'required|string',
        'point' => 'required|integer',
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
        return $this->hasMany(\App\Models\Administration\DumpQuestion::class, 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantQuestions()
    {
        return $this->hasMany(\App\Models\Administration\EtudiantQuestion::class, 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function certification()
    {
        return $this->belongsTo(\App\Models\Administration\Certification::class, 'certification_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function options()
    {
        return $this->hasMany(\App\Models\Administration\Option::class, 'question_id');
    }

}
