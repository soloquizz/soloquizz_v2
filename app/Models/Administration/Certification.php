<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Certification
 * @package App\Models\Administration
 * @version June 12, 2023, 2:44 pm UTC
 *
 * @property \App\Models\Administration\Editeur $editeur
 * @property \App\Models\Administration\Niveaux $niveau
 * @property string $code
 * @property string $titre
 * @property integer $editeur_id
 * @property integer $niveau_id
 */
class Certification extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'certifications';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'titre',
        'editeur_id',
        'niveau_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'titre' => 'string',
        'editeur_id' => 'integer',
        'niveau_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:255',
        'titre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'editeur_id' => 'required',
        'niveau_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function editeur()
    {
        return $this->belongsTo(\App\Models\Administration\Editeur::class, 'editeur_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function niveau()
    {
        return $this->belongsTo(\App\Models\Administration\Niveau::class, 'niveau_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questions()
    {
        return $this->hasMany(\App\Models\Administration\Question::class, 'certification_id');
    }
}
