<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Option;
use App\Repositories\BaseRepository;

/**
 * Class OptionRepository
 * @package App\Repositories\Administration
 * @version June 17, 2023, 11:23 am UTC
*/

class OptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contenu',
        'correcte',
        'question_id'
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
        return Option::class;
    }
}
