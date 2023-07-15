<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Enseignant
 * @package App\Models\Administration
 * @version July 8, 2023, 3:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $enseignantCours
 * @property string $matricule
 * @property string $prenom
 * @property string $nom
 * @property string $telephone
 * @property string $email_personnel
 */
class Enseignant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'enseignants';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'matricule',
        'prenom',
        'nom',
        'telephone',
        'email_personnel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'matricule' => 'string',
        'prenom' => 'string',
        'nom' => 'string',
        'telephone' => 'string',
        'email_personnel' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricule' => 'required|string|max:191',
        'prenom' => 'required|string|max:191',
        'nom' => 'required|string|max:191',
        'telephone' => 'required|string|max:191',
        'email_personnel' => 'nullable|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function enseignantCours()
    {
        return $this->hasMany(\App\Models\Administration\EnseignantCours::class, 'enseignant_id');
    }

    public function user()
    {
        return User::where('personne_id',$this->id)->where('personne_type','Enseignant')->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function cours()
    {
        return $this->hasMany(\App\Models\Administration\Cours::class, 'enseignant_id');
    }

    public function classes()
    {
        $classes_id = $this->cours->pluck('classe_id');

        return Classe::whereIn('id',$classes_id)->get();

    }
}
