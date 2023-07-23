<?php

namespace App\Models\Enseignant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Exercice
 * @package App\Models\Enseignant
 * @version July 21, 2023, 11:56 am UTC
 *
 * @property \App\Models\Administration\Cours $cours
 * @property \App\Models\Administration\Seance $seance
 * @property \Illuminate\Database\Eloquent\Collection $etudiantExercices
 * @property \Illuminate\Database\Eloquent\Collection $questionExercices
 * @property string $titre
 * @property integer $note_max
 * @property integer $duree
 * @property integer $cours_id
 * @property integer $seance_id
 */
class Exercice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'exercices';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'note_max',
        'duree',
        'cours_id',
        'seance_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titre' => 'string',
        'note_max' => 'integer',
        'duree' => 'integer',
        'cours_id' => 'integer',
        'seance_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required|string|max:191',
        'note_max' => 'nullable|integer',
        'duree' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'cours_id' => 'required',
        'seance_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cours()
    {
        return $this->belongsTo(\App\Models\Administration\Cours::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seance()
    {
        return $this->belongsTo(\App\Models\Administration\Seance::class, 'seance_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantExercices()
    {
        return $this->hasMany(\App\Models\Enseignant\EtudiantExercice::class, 'exercice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionExercices()
    {
        return $this->hasMany(\App\Models\Enseignant\QuestionExercice::class, 'exercice_id');
    }
}
