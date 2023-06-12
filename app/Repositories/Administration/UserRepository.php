<?php

namespace App\Repositories\Administration;

use App\Models\Administration\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories\Administration
 * @version June 10, 2023, 6:33 pm UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'email_verified_at',
        'password',
        'user_type',
        'user_id',
        'remember_token'
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
        return User::class;
    }
}
