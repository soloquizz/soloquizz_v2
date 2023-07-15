<?php

namespace App\Models\Administration;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Support
 * @package App\Models\Administration
 * @version July 12, 2023, 11:35 am UTC
 *
 * @property \App\Models\Administration\Cour $cours
 * @property string $file_name
 * @property integer $cours_id
 */
class Support extends Model implements HasMedia
{
    use SoftDeletes;

    use InteractsWithMedia;

    use HasFactory;

    public $table = 'supports';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'file_name',
        'cours_id',
        'enseignant_id',
        'seance_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'file_name' => 'string',
        'cours_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'file_name' => 'required|string|max:191',
        'cours_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cours()
    {
        return $this->belongsTo(\App\Models\Administration\Cours::class, 'cours_id');
    }
}
