<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Etudiant
 * @package App\Models\Administration
 * @version June 14, 2023, 4:10 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $dumpUsers
 * @property \Illuminate\Database\Eloquent\Collection $etudiantQuestions
 * @property \Illuminate\Database\Eloquent\Collection $inscriptions
 * @property string $numero_carte
 * @property string $prenom
 * @property string $nom
 * @property string $telephone
 * @property string $email_personnel
 */
class Etudiant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'etudiants';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'numero_carte',
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
        'numero_carte' => 'string',
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
        'numero_carte' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'email_personnel' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dumpUsers()
    {
        return $this->hasMany(\App\Models\Administration\DumpUser::class, 'etudiant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function etudiantQuestions()
    {
        return $this->hasMany(\App\Models\Administration\EtudiantQuestion::class, 'etudiant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inscriptions()
    {
        return $this->hasMany(\App\Models\Administration\Inscription::class, 'etudiant_id');
    }
}
