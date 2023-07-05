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


Route::name('etudiant.')->prefix('etudiant')->middleware(['auth'])->group(function () {
    Route::get('/',[App\Http\Controllers\Etudiant\EtudiantController::class,'index'])->name('index');

    //Cours
    Route::get('/cours',[App\Http\Controllers\Etudiant\CourController::class,'index'])->name('cours');
    Route::get('/cours-show/{cours_id}',[App\Http\Controllers\Etudiant\CourController::class,'show'])->name('cours.show');

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
