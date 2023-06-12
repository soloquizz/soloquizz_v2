<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Certification;
use App\Repositories\BaseRepository;

/**
 * Class CertificationRepository
 * @package App\Repositories\Administration
 * @version June 12, 2023, 2:44 pm UTC
*/

class CertificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'titre',
        'editeur_id',
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
        return Certification::class;
    }
}
