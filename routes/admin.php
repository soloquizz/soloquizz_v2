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


Route::name('admin.')->prefix('admin')->middleware(['auth','check.actif.compte','check.admin','check.change.password'])->group(function () {
    Route::get('/',[App\Http\Controllers\Administration\HomeController::class,'index'])->name('index');

    Route::resource('administrateurs', App\Http\Controllers\Administration\AdministrateurController::class);

    Route::resource('users', App\Http\Controllers\Administration\UserController::class);

    Route::resource('editeurs', App\Http\Controllers\Administration\EditeurController::class);

    Route::resource('domaines', App\Http\Controllers\Administration\DomaineController::class);

    Route::resource('parcours', App\Http\Controllers\Administration\ParcoursController::class);

    Route::resource('niveaux', App\Http\Controllers\Administration\NiveauController::class);

    Route::resource('classes', App\Http\Controllers\Administration\ClasseController::class);

    Route::resource('semestres', App\Http\Controllers\Administration\SemestreController::class);
    
    Route::resource('permissions',App\Http\Controllers\Administration\PermissionController::class);
    Route::post('addPermissionUser',[App\Http\Controllers\Administration\PermissionController::class,'addPermissionToUser'])->name('addPermissionToUser');
    Route::post('revokePermissionUser',[App\Http\Controllers\Administration\PermissionController::class,'revokePermissionToUser'])->name('revokePermissionToUser');

    Route::resource('roles',App\Http\Controllers\Administration\RoleController::class);
    Route::post('addRole',[App\Http\Controllers\Administration\RoleController::class,'addRole'])->name('assignRole');
    Route::post('role/give-permission/{id}',[App\Http\Controllers\Administration\RoleController::class,'givePermissionToRole'])->name('givePermissionToRole');
    Route::post('role/revoke-permission/{id}',[App\Http\Controllers\Administration\RoleController::class,'revokePermissionToRole'])->name('revokePermissionToRole');

    Route::resource('cours', App\Http\Controllers\Administration\CoursController::class);
    Route::get('parametres',[App\Http\Controllers\Administration\ParametreController::class,'index'])->name('parametre');
    Route::get('roleetpermission',[App\Http\Controllers\Administration\RoleAndPermissionController::class,'index'])->name('role&permission');
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
    Route::post('certifications-define-nbqa', [App\Http\Controllers\Administration\CertificationController::class,'defineNbreQa'])->name('certifications.define_nbreqa');
    Route::post('certifications-define-nbemax', [App\Http\Controllers\Administration\CertificationController::class,'defineNbreMax'])->name('certifications.define_nbremax');
    Route::post('certifications-update-statut/{id}', [App\Http\Controllers\Administration\CertificationController::class,'updateS'])->name('certifications.update.statut');
    Route::post('certifications-depublier-statut/{id}', [App\Http\Controllers\Administration\CertificationController::class,'depublier'])->name('certifications.depublier.statut');
    Route::get('list-etudiants/{id}',[\App\Http\Controllers\Administration\CertificationController::class,'listEtudiants'])->name('certifications.list.etudiants');

    Route::resource('questions', App\Http\Controllers\Administration\QuestionController::class);
    Route::get('questions-edit-custom', [App\Http\Controllers\Administration\QuestionController::class,'editCustom'])->name('questions.edit.custom');


    Route::post('questions-search', [App\Http\Controllers\Administration\QuestionController::class,'search'])->name('questions.search');

    Route::resource('options', App\Http\Controllers\Administration\OptionController::class);
    Route::get('options-edit-custom', [App\Http\Controllers\Administration\OptionController::class,'editCustom'])->name('options.edit.custom');

    Route::post('users-update', [App\Http\Controllers\Administration\UserController::class,'update'])->name('users.update');

});
Route::name('admin.')->prefix('admin')->middleware(['auth','check.actif.compte','check.admin'])->group(function () {

    //Change Password
    Route::get('password-change-show', [App\Http\Controllers\Administration\HomeController::class,'showPasswordChange'])->name('password.change.show');
    Route::post('password-change-store', [App\Http\Controllers\Administration\HomeController::class,'storePasswordChange'])->name('password.change.store');

});
