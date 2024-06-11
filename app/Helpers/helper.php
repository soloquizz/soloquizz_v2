<?php

use \App\Models\Administration\Etudiant;
use \App\Models\Administration\Certification;
use \App\Models\Administration\Classe;
use \App\Models\Administration\Editeur;
use App\Models\Administration\User;
use RealRashid\SweetAlert\Facades\Alert;

if (!function_exists('getNbreEtudiants')) {
    function getNbreEtudiants()
    {
        return Etudiant::count();
    }
}

if (!function_exists('getNbreCertifications')) {
    function getNbreCertifications()
    {
        return Certification::count();
    }
}

if (!function_exists('getNbreClasses')) {
    function getNbreClasses()
    {
        return Classe::count();
    }
}

if (!function_exists('getEtudiantCertifications')) {
    function getEtudiantCertifications(Editeur $editeur)
    {
        if (auth()->user()->personne_type == 'Candidat'){
            return $editeur->certifications;
        }
        return $editeur->certifications->filter(function ($certification){
            return $certification->statut and $certification->niveau?->id == auth()->user()?->etudiant()?->classe()?->niveau?->id;
        });
    }
}

if (!function_exists('checkCandidatTest')) {
    function checkCandidatTest($candidat_id)
    {
        $candidat = \App\Models\Administration\Candidats::find($candidat_id);

        $user = User::where('personne_type','Candidat')->where('personne_id',$candidat->id)->first();
        $certification = Certification::where('code','C.2024')->first();
        $dump_user = $certification->dumpUsers->where('user_id',$user->id)->first();

        if (empty($dump_user)){
            return false;
        }
        else{
            return $dump_user;
        }
    }
}











