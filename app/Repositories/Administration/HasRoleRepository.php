<?php

namespace App\Repositories\Administration;

use App\Models\Administration\HasRole;
use App\Repositories\BaseRepository;

/**
 * Class HasRoleRepository
 * @package App\Repositories\Administration
 * @version August 18, 2023, 3:28 pm UTC
*/

class HasRoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HasRole::class;
    }
}
