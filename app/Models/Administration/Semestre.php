<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Semestre
 * @package App\Models\Administration
 * @version July 5, 2023, 12:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $cours
 * @property string $nom
 * @property integer $numero
 */
class Semestre extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'semestres';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'numero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'numero' => 'integer'
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
        'deleted_at' => 'nullable',
        'numero' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cours()
    {
        return $this->hasMany(\App\Models\Administration\Cour::class, 'semestre_id');
    }
}
