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

Auth::routes();
/*Route::get('/index2',function(){
    return view('template.index2');
});*/


Route::get('/', [App\Http\Controllers\IndexController::class,'index'])->name('welcome');
Route::get('/test-smtp', [App\Http\Controllers\IndexController::class,'testSmtp']);

@include('auth.php');
@include('etudiant.php');
@include('admin.php');
@include('enseignant.php');
//init plan aida_dev branch
