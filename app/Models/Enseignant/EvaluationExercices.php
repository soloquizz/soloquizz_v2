<?php

namespace App\Models\Enseignant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EvaluationExercices
 * @package App\Models\Enseignant
 * @version August 9, 2023, 10:47 am UTC
 *
 * @property \App\Models\Enseignant\Evaluations $evaluation
 * @property \App\Models\Enseignant\Exercice $exercice
 * @property integer $evaluation_id
 * @property integer $exercice_id
 */
class EvaluationExercices extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'evaluation_exercices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'evaluation_id',
        'exercice_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'evaluation_id' => 'integer',
        'exercice_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'evaluation_id' => 'required',
        'exercice_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function evaluation()
    {
        return $this->belongsTo(\App\Models\Enseignant\Evaluations::class, 'evaluation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function exercice()
    {
        return $this->belongsTo(\App\Models\Enseignant\Exercice::class, 'exercice_id');
    }
}
