<?php

namespace App\Http\Controllers;

use App\Mail\CompteInfos;
use App\Models\Administration\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        return view('template.index');
    }

    public function testSmtp()
    {
        $user = User::find(4);
        //Mail::to($user)->send(new CompteInfos());
    }
}
