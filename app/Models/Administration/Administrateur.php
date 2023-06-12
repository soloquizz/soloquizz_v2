<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Administrateur
 * @package App\Models\Administration
 * @version June 8, 2023, 11:59 pm UTC
 *
 * @property int $id
 * @property string $matricule
 * @property string $prenom
 * @property string $nom
 * @property string $telephone
 * @property string $email_personnel
 */
class Administrateur extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'administrateurs';
    
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
        'matricule' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'email_personnel' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function user()
    {
        return User::where('personne_id',$this->id)->where('personne_type','Administrateur')->first();
    }
    
}
