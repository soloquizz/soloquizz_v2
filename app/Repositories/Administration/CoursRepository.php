<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Cours;
use App\Models\Enseignant\QuestionCours;
use App\Repositories\BaseRepository;

/**
 * Class CoursRepository
 * @package App\Repositories\Administration
 * @version July 7, 2023, 12:10 am UTC
*/

class CoursRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'lien',
        'etat',
        'classe_id',
        'semestre_id'
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
        return Cours::class;
    }

    public function questionsCours($cours_id,$paginate_number)
    {
        return QuestionCours::where('cours_id',$cours_id)->paginate($paginate_number);
    }

    public function search($cours_id,$textSearch, int $perPage)
    {
        $query = QuestionCours::where('cours_id',$cours_id)->Where('contenu', 'like', '%' . $textSearch . '%');

        return $query->paginate($perPage);
    }

     public function getLastPage($cours_id,int $perPage)
     {
         return QuestionCours::where('cours_id',$cours_id)->paginate($perPage)->lastPage();
     }
}
