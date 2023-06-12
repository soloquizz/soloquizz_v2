<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Editeur
 * @package App\Models\Administration
 * @version June 11, 2023, 12:08 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $certifications
 * @property string $nom
 */
class Editeur extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'editeurs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certifications()
    {
        return $this->hasMany(\App\Models\Administration\Certification::class, 'editeur_id');
    }
}
