<?php

namespace App\Repositories\Enseignant;

use App\Repositories\BaseRepository;
use App\Models\Enseignant\QuestionCours;
/**
 * Class QuestionCoursRepository
 * @package App\Repositories
 * @version July 19, 2023, 11:01 am UTC
*/

class QuestionCoursRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contenu',
        'qcm'
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
        return QuestionCours::class;
    }

    public function getQuestionsByCours($cours_id,$paginate_number)
    {
        return QuestionCours::where('cours_id',$cours_id)->paginate($paginate_number);
    }
}
