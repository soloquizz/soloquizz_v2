<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Candidats;
use App\Repositories\BaseRepository;

/**
 * Class CandidatsRepository
 * @package App\Repositories\Administration
 * @version June 10, 2024, 8:28 pm UTC
*/

class CandidatsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'pays_residance',
        'niveau_etude'
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
        return Candidats::class;
    }
}
