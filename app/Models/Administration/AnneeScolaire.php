<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AnneeScolaire
 * @package App\Models\Administration
 * @version June 20, 2023, 12:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $inscriptions
 * @property string $code
 * @property string $annee
 */
class AnneeScolaire extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'annee_scolaires';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'annee',
        'actif'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'annee' => 'string',
        'actif' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:255',
        'annee' => 'required|string|max:255',
        'actif' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inscriptions()
    {
        return $this->hasMany(\App\Models\Administration\Inscription::class, 'annee_scolaire_id');
    }
}
