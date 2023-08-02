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


Route::name('enseignant.')->prefix('enseignant')->middleware(['auth','check.actif.compte','check.enseignant','check.change.password'])->group(function () {
    Route::get('/',[App\Http\Controllers\Enseignant\EnseignantController::class,'index'])->name('index');

    //Cours
    Route::get('/cours',[App\Http\Controllers\Enseignant\CoursController::class,'index'])->name('cours');
    Route::get('/cours-show/{cours_id}',[App\Http\Controllers\Enseignant\CoursController::class,'show'])->name('cours.show');
    Route::post('cours-store-support',[App\Http\Controllers\Enseignant\CoursController::class,'storeSupport'])->name('cours.store.support');


    //Séances
    Route::post('/seances-store',[App\Http\Controllers\Enseignant\SeanceController::class,'store'])->name('seances.store');

    //QuestionsCours
    Route::post('/questions-store',[App\Http\Controllers\Enseignant\QuestionCoursController::class,'store'])->name('questionCours.store');
    Route::get('/questionCours-edit-custom', [App\Http\Controllers\Enseignant\QuestionCoursController::class,'editCustom'])->name('questionCours.edit.custom');
    Route::post('/question-update/{id}',[App\Http\Controllers\Enseignant\QuestionCoursController::class,'update'])->name('questionCours.update');
    
    //Exercices
    Route::post('/td-store',[App\Http\Controllers\Enseignant\ExerciceController::class,'store'])->name('exercice.store');
    Route::get('/cours-show/TD/{td_id}',[App\Http\Controllers\Enseignant\ExerciceController::class,'index'])->name('cours.show.td');
    Route::get('/td/{td_id}',[App\Http\Controllers\Enseignant\ExerciceController::class,'show'])->name('cours.show.td.question');

    //Question Exercice
    Route::post('/ques-store',[App\Http\Controllers\Enseignant\QuestionExerciceController::class,'store'])->name('question.exercice.store');

    //Option Cours
    Route::post('/option-cours-store',[App\Http\Controllers\Enseignant\OptionCoursController::class,'store'])->name('option.cours.store');
    Route::get('options-edit-custom', [App\Http\Controllers\Enseignant\OptionCoursController::class,'editCustom'])->name('options.cours.edit.custom');
    Route::post('options-edit-custom/{id}', [App\Http\Controllers\Enseignant\OptionCoursController::class,'update'])->name('options.cours.update');


});

Route::name('enseignant.')->prefix('enseignant')->middleware(['auth','check.actif.compte','check.enseignant'])->group(function () {
    //Change Password
    Route::get('password-change-show', [App\Http\Controllers\Enseignant\EnseignantController::class,'showPasswordChange'])->name('password.change.show');
    Route::post('password-change-store', [App\Http\Controllers\Enseignant\EnseignantController::class,'storePasswordChange'])->name('password.change.store');

});
