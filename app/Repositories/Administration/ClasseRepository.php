<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Classe;
use App\Repositories\BaseRepository;

/**
 * Class ClasseRepository
 * @package App\Repositories\Administration
 * @version June 11, 2023, 11:40 pm UTC
*/

class ClasseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'parcour_id',
        'domaine_id',
        'niveau_id'
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
        return Classe::class;
    }
}
