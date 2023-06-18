<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Etudiant;
use App\Repositories\BaseRepository;

/**
 * Class EtudiantRepository
 * @package App\Repositories\Administration
 * @version June 14, 2023, 4:10 pm UTC
*/

class EtudiantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero_carte',
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
        return Etudiant::class;
    }
}
