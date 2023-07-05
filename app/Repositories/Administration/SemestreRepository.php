<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Semestre;
use App\Repositories\BaseRepository;

/**
 * Class SemestreRepository
 * @package App\Repositories\Administration
 * @version July 5, 2023, 12:05 am UTC
*/

class SemestreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'numero'
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
        return Semestre::class;
    }
}
