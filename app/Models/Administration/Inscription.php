<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inscription
 * @package App\Models\Administration
 * @version June 20, 2023, 12:04 am UTC
 *
 * @property \App\Models\Administration\AnneeScolaire $anneeScolaire
 * @property \App\Models\Administration\Class $classe
 * @property \App\Models\Administration\Etudiant $etudiant
 * @property integer $etudiant_id
 * @property integer $classe_id
 * @property integer $annee_scolaire_id
 */
class Inscription extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'inscriptions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etudiant_id',
        'classe_id',
        'annee_scolaire_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etudiant_id' => 'integer',
        'classe_id' => 'integer',
        'annee_scolaire_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'etudiant_id' => 'required',
        'classe_id' => 'required',
        'annee_scolaire_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anneeScolaire()
    {
        return $this->belongsTo(\App\Models\Administration\AnneeScolaire::class, 'annee_scolaire_id');
    }

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
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\Administration\Etudiant::class, 'etudiant_id');
    }
}
