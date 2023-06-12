<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Niveau;
use App\Repositories\BaseRepository;

/**
 * Class NiveauRepository
 * @package App\Repositories\Administration
 * @version June 11, 2023, 11:39 pm UTC
*/

class NiveauRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'annee',
        'parcour_id'
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
        return Niveau::class;
    }
}
