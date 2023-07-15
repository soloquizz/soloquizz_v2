<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Enseignant;
use App\Repositories\BaseRepository;

/**
 * Class EnseignantRepository
 * @package App\Repositories\Administration
 * @version July 8, 2023, 3:58 pm UTC
*/

class EnseignantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matricule',
        'prenom',
        'nom',
        'telephone',
        'email_personnel'
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
        return Enseignant::class;
    }
}
