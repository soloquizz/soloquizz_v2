<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Editeur;
use App\Repositories\BaseRepository;

/**
 * Class EditeurRepository
 * @package App\Repositories\Administration
 * @version June 11, 2023, 11:58 am UTC
*/

class EditeurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom'
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
        return Editeur::class;
    }
}
