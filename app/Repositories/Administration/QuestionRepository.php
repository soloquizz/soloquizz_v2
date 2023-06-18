<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Question;
use App\Repositories\BaseRepository;

/**
 * Class QuestionRepository
 * @package App\Repositories\Administration
 * @version June 12, 2023, 4:35 pm UTC
*/

class QuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contenu',
        'point',
        'duree'
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
        return Question::class;
    }

    public function getQuestionsByCertif($certif_id,$paginate_number)
    {
        return Question::where('certification_id',$certif_id)->paginate($paginate_number);
    }




}
