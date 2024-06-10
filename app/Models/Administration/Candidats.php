<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Candidats
 * @package App\Models\Administration
 * @version June 10, 2024, 8:28 pm UTC
 *
 * @property string $prenom
 * @property string $nom
 * @property string $email
 * @property string $telephone
 * @property string $pays_residance
 * @property string $niveau_etude
 */
class Candidats extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'candidats';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'pays_residance',
        'niveau_etude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prenom' => 'string',
        'nom' => 'string',
        'email' => 'string',
        'telephone' => 'string',
        'pays_residance' => 'string',
        'niveau_etude' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prenom' => 'required|string|max:191',
        'nom' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'telephone' => 'required|string|max:191',
        'pays_residance' => 'required|string|max:191',
        'niveau_etude' => 'required|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function user()
    {
        return User::where('personne_id',$this->id)->where('personne_type','Candidat')->first();
    }
    
}
