<?php

namespace App\Repositories\Administration;

use App\Models\Administration\AnneeScolaire;
use App\Repositories\BaseRepository;

/**
 * Class AnneeScolaireRepository
 * @package App\Repositories\Administration
 * @version June 20, 2023, 12:10 am UTC
*/

class AnneeScolaireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'annee'
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
        return AnneeScolaire::class;
    }
}
