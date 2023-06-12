<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Domaine
 * @package App\Models\Administration
 * @version June 12, 2023, 12:34 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $classes
 * @property string $nom
 */
class Domaine extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'domaines';
    
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
    public function classes()
    {
        return $this->hasMany(\App\Models\Administration\Class::class, 'domaine_id');
    }
}
