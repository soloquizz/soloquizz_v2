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


Route::name('etudiant.')->prefix('etudiant')->middleware(['auth','check.actif.compte','check.current.dump','check.etudiant','check.change.password'])->group(function () {
    Route::get('/',[App\Http\Controllers\Etudiant\EtudiantController::class,'index'])->name('index');

    //Cours
    Route::get('/cours',[App\Http\Controllers\Etudiant\CourController::class,'index'])->name('cours');
    Route::get('/cours-show/{cours_id}',[App\Http\Controllers\Etudiant\CourController::class,'show'])->name('cours.show');
    Route::get('/td/{td_id}',[App\Http\Controllers\Etudiant\CourController::class,'showTD'])->name('cours.show.td.question');


    //Certification
    Route::get('/certifications',[App\Http\Controllers\Etudiant\CertificationController::class,'index'])->name('certifications');

    //Dumps
    Route::get('/dumps/{certification_id}',[App\Http\Controllers\Etudiant\DumpController::class,'dumps'])->name('dumps');
    Route::get('/dumps-take/{certification_id}',[App\Http\Controllers\Etudiant\DumpController::class,'dumps_take'])->name('dumps.take');
    Route::get('/dumps-resultat/{dump_user_id}',[App\Http\Controllers\Etudiant\DumpController::class,'resultat'])->name('dumps.resultat');
    Route::get('/dumps-info',[App\Http\Controllers\Etudiant\DumpController::class,'info'])->name('dumps.info');

    Route::post('/dumps-store',[App\Http\Controllers\Etudiant\DumpController::class,'store'])->name('dumps.store');

    //Discussions
    Route::get('/discussions',[App\Http\Controllers\Etudiant\EtudiantController::class,'discussions'])->name('discussions');

});


Route::name('etudiant.')->prefix('etudiant')->middleware(['auth','check.actif.compte','check.current.dump','check.etudiant'])->group(function () {
    //Change Password
    Route::get('password-change-show', [App\Http\Controllers\Etudiant\EtudiantController::class,'showPasswordChange'])->name('password.change.show');
    Route::post('password-change-store', [App\Http\Controllers\Etudiant\EtudiantController::class,'storePasswordChange'])->name('password.change.store');
});


