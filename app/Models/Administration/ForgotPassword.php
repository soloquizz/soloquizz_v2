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


    protected $dates = ['deleted_at'];



    public $fillable = [
        'email',
        'token',
        'statut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'token' => 'string',
        'statut'=> 'boolean'
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
        'statut'=>'nullable'
    ];

    
}
