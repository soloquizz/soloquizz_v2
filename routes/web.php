<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('template.index');
});

@include('etudiant.php');
@include('admin.php');


Route::group(['prefix' => 'administration'], function () {
    Route::resource('etudiants', App\Http\Controllers\Administration\EtudiantController::class, ["as" => 'administration']);
});
