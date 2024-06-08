<?php

namespace App\Models\Etudiant;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EtudiantQuestionCoursOption
 * @package App\Models\Etudiant
 * @version August 16, 2023, 12:14 pm UTC
 *
 * @property \App\Models\Etudiant\Etudiant $etudiant
 * @property \App\Models\Etudiant\EtudiantQuestionCours $etudQuestCours
 * @property \App\Models\Etudiant\Option $option
 * @property \App\Models\Etudiant\User $user
 * @property integer $etudiant_id
 * @property integer $user_id
 * @property integer $etud_quest_cours_id
 * @property integer $option_id
 * @property boolean $trouve
 */
class EtudiantQuestionCoursOption extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'etudiant_question_cours_options';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etudiant_id',
        'user_id',
        'etud_quest_cours_id',
        'option_id',
        'trouve'
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
        'etud_quest_cours_id' => 'integer',
        'option_id' => 'integer',
        'trouve' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etudiant_id' => 'nullable',
        'user_id' => 'required',
        'etud_quest_cours_id' => 'required',
        'option_id' => 'required',
        'trouve' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function etudiant()
    {
        return $this->belongsTo(\App\Models\Etudiant\Etudiant::class, 'etudiant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function etudQuestCours()
    {
        return $this->belongsTo(\App\Models\Etudiant\EtudiantQuestionCours::class, 'etud_quest_cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function option()
    {
        return $this->belongsTo(\App\Models\Enseignant\OptionCours::class, 'option_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Administration\User::class, 'user_id');
    }
}
