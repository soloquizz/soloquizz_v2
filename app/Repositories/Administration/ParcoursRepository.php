<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Parcours;
use App\Repositories\BaseRepository;

/**
 * Class ParcoursRepository
 * @package App\Repositories\Administration
 * @version June 11, 2023, 11:35 pm UTC
*/

class ParcoursRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
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
        return Parcours::class;
    }
}
