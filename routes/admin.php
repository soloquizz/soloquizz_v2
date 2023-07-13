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


Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/',[App\Http\Controllers\Administration\HomeController::class,'index'])->name('index');

    Route::resource('administrateurs', App\Http\Controllers\Administration\AdministrateurController::class);

    Route::resource('users', App\Http\Controllers\Administration\UserController::class);

    Route::resource('editeurs', App\Http\Controllers\Administration\EditeurController::class);

    Route::resource('domaines', App\Http\Controllers\Administration\DomaineController::class);

    Route::resource('parcours', App\Http\Controllers\Administration\ParcoursController::class);

    Route::resource('niveaux', App\Http\Controllers\Administration\NiveauController::class);

    Route::resource('classes', App\Http\Controllers\Administration\ClasseController::class);

    Route::resource('semestres', App\Http\Controllers\Administration\SemestreController::class);

    Route::resource('cours', App\Http\Controllers\Administration\CoursController::class);

    Route::post('cours-enseignant-store',[App\Http\Controllers\Administration\CoursController::class,'enseignant_store'])->name('cours.enseignant_store');

    Route::resource('enseignants', App\Http\Controllers\Administration\EnseignantController::class);

    Route::resource('etudiants', App\Http\Controllers\Administration\EtudiantController::class);
    Route::get('etudiants-edit-inscription/{inscription_id}',[App\Http\Controllers\Administration\EtudiantController::class,'editInscription'])->name('etudiants.edit_inscription');

    Route::post('etudiants-add-inscription',[App\Http\Controllers\Administration\EtudiantController::class,'addInscription'])->name('etudiants.add_inscription');
    Route::post('etudiants-update-inscription',[App\Http\Controllers\Administration\EtudiantController::class,'updateInscription'])->name('etudiants.update_inscription');

    Route::resource('anneeScolaires', App\Http\Controllers\Administration\AnneeScolaireController::class);

    Route::resource('certifications', App\Http\Controllers\Administration\CertificationController::class);
    Route::get('certifications-questions-display', [App\Http\Controllers\Administration\CertificationController::class,'questionsDisplay'])->name('certifications.questions.display');
    Route::post('certifications-questions-search', [App\Http\Controllers\Administration\CertificationController::class,'searchQuestions'])->name('certifications.questions.search');

    Route::resource('questions', App\Http\Controllers\Administration\QuestionController::class);
    Route::get('questions-edit-custom', [App\Http\Controllers\Administration\QuestionController::class,'editCustom'])->name('questions.edit.custom');


    Route::post('questions-search', [App\Http\Controllers\Administration\QuestionController::class,'search'])->name('questions.search');

    Route::resource('options', App\Http\Controllers\Administration\OptionController::class);
    Route::get('options-edit-custom', [App\Http\Controllers\Administration\OptionController::class,'editCustom'])->name('options.edit.custom');

    Route::post('users-update', [App\Http\Controllers\Administration\UserController::class,'update'])->name('users.update');

});
