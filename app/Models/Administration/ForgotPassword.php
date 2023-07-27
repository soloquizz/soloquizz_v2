<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ForgotPassword
 * @package App\Models\Administration
 * @version July 26, 2023, 8:13 pm UTC
 *
 * @property string $email
 * @property string $token
 */
class ForgotPassword extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'password_resets';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const deleted_at='';
    //public $timestamps = false;
    public $fillable = [
        'email',
        'token',
       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'token' => 'string',        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|string|max:191',
        'token' => 'required|string|max:191',
        'created_at' => 'nullable',
        'created_at' => 'nullable',
        'deleted_at' => 'nullable',
        'statut'=>'nullable'
    ];
    
}
