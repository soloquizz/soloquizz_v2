<?php

namespace App\Repositories\Administration;

use App\Models\Administration\Certification;
use App\Models\Administration\Question;
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

    public function questions($certif_id,$paginate_number)
    {
        return Question::where('certification_id',$certif_id)->paginate($paginate_number);
    }

    public function search($certif_id,$textSearch, int $perPage)
    {
        $query = Question::where('certification_id',$certif_id)->Where('contenu', 'like', '%' . $textSearch . '%');

        return $query->paginate($perPage);
    }

     public function getLastPage($certif_id,int $perPage)
     {
         return Question::where('certification_id',$certif_id)->paginate($perPage)->lastPage();
     }

}
