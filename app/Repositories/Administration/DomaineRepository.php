<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Domaine;
use App\Repositories\BaseRepository;

/**
 * Class DomaineRepository
 * @package App\Repositories\Administration
 * @version June 12, 2023, 12:34 pm UTC
*/

class DomaineRepository extends BaseRepository
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
        return Domaine::class;
    }
}
