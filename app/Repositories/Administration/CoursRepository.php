<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Cours;
use App\Repositories\BaseRepository;

/**
 * Class CoursRepository
 * @package App\Repositories\Administration
 * @version July 7, 2023, 12:10 am UTC
*/

class CoursRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'lien',
        'etat',
        'classe_id',
        'semestre_id'
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
        return Cours::class;
    }
}
