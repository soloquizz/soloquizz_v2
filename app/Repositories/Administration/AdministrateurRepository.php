<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Administrateur;
use App\Repositories\BaseRepository;

/**
 * Class AdministrateurRepository
 * @package App\Repositories\Administration
 * @version June 8, 2023, 11:59 pm UTC
*/

class AdministrateurRepository extends BaseRepository
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
        return Administrateur::class;
    }
}
