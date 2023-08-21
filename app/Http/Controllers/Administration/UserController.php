<?php

namespace App\Http\Controllers\Administration;

use App\Http\Requests\Administration\CreateUserRequest;
use App\Http\Requests\Administration\UpdateUserRequest;
use App\Repositories\Administration\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function update(Request $request)
    {
        $input = $request->all();
        if (isset($input['password'])){
            if ($input['password'] != $input['password_confirmed']){
                Alert::success('Les deux mots de passe ne sont pas conforment');
                return redirect()->back();
            }
            $input['password'] = bcrypt($input['password']);
        }

        $user = $this->userRepository->find($input['user_id']);

        if (empty($user)){
            Alert::error('Utilisateur non trouvé');
            return redirect()->back();
        }   
        
       
        $user->update($input);

        Alert::success('Mise à jour utilisateur effectué avec succés');
        return redirect()->back();

    }
}
