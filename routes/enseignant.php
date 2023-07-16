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


Route::name('enseignant.')->prefix('enseignant')->middleware(['auth','check.enseignant'])->group(function () {
    Route::get('/',[App\Http\Controllers\Enseignant\EnseignantController::class,'index'])->name('index');

    //Cours
    Route::get('/cours',[App\Http\Controllers\Enseignant\CoursController::class,'index'])->name('cours');
    Route::get('/cours-show/{cours_id}',[App\Http\Controllers\Enseignant\CoursController::class,'show'])->name('cours.show');
    Route::post('cours-store-support',[App\Http\Controllers\Enseignant\CoursController::class,'storeSupport'])->name('cours.store.support');


    //Séances
    Route::post('/seances-store',[App\Http\Controllers\Enseignant\SeanceController::class,'store'])->name('seances.store');

});
