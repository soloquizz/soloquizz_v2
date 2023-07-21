<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Cours
 * @package App\Models\Administration
 * @version July 7, 2023, 12:10 am UTC
 *
 * @property \App\Models\Administration\Class $classe
 * @property \App\Models\Administration\Semestre $semestre
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 * @property \Illuminate\Database\Eloquent\Collection $exercices
 * @property \Illuminate\Database\Eloquent\Collection $questionCours
 * @property \Illuminate\Database\Eloquent\Collection $seances
 * @property string $nom
 * @property string $lien
 * @property string $image
 * @property boolean $etat
 * @property integer $classe_id
 * @property integer $semestre_id
 */
class Cours extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cours';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'lien',
        'image',
        'etat',
        'classe_id',
        'semestre_id',
        'enseignant_id',
        'nbre_qa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'lien' => 'string',
        'image' => 'string',
        'etat' => 'boolean',
        'classe_id' => 'integer',
        'semestre_id' => 'integer',
        'enseignant_id' => 'integer',
        'nbre_qa' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:191',
        'lien' => 'nullable|string|max:191',
        'image' => 'nullable|file|mimes:jpeg,png,gif',
        'etat' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'classe_id' => 'required',
        'semestre_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function classe()
    {
        return $this->belongsTo(\App\Models\Administration\Classe::class, 'classe_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function semestre()
    {
        return $this->belongsTo(\App\Models\Administration\Semestre::class, 'semestre_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function evaluations()
    {
        return $this->hasMany(\App\Models\Administration\Evaluation::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function exercices()
    {
        return $this->hasMany(\App\Models\Enseignant\Exercice::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questionCours()
    {
        return $this->hasMany(\App\Models\Enseignant\QuestionCours::class, 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function seances()
    {
        return $this->hasMany(\App\Models\Administration\Seance::class, 'cours_id');
    }

    public function image()
    {
        return asset("storage/image_cours/" . $this->image);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function enseignant()
    {
        return $this->belongsTo(\App\Models\Administration\Enseignant::class, 'enseignant_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function supports()
    {
        return $this->hasMany(\App\Models\Administration\Support::class, 'cours_id');
    }
}
