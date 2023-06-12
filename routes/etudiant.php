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


Route::name('etudiant.')->prefix('etudiant')/*->middleware(['cas.auth', 'check.permission'])*/->group(function () {
    Route::get('/',[App\Http\Controllers\Etudiant\EtudiantController::class,'index'])->name('index');

    //Cours
    Route::get('/cours',[App\Http\Controllers\Etudiant\EtudiantController::class,'cours'])->name('cours');

    //Dumps
    Route::get('/dumps',[App\Http\Controllers\Etudiant\DumpController::class,'dumps'])->name('dumps');
    Route::get('/dumps-resultat',[App\Http\Controllers\Etudiant\DumpController::class,'resultat'])->name('dumps.resultat');
    Route::get('/dumps-info',[App\Http\Controllers\Etudiant\DumpController::class,'info'])->name('dumps.info');

    //Discussions
    Route::get('/discussions',[App\Http\Controllers\Etudiant\EtudiantController::class,'discussions'])->name('discussions');
});
