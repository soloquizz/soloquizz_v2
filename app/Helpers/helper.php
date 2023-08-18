<?php

use \App\Models\Administration\Etudiant;
use \App\Models\Administration\Certification;
use \App\Models\Administration\Classe;
use \App\Models\Administration\Editeur;

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
        return $editeur->certifications->filter(function ($certification){
            return $certification->statut and $certification->niveau?->id == auth()->user()?->etudiant()?->classe()?->niveau?->id;
        });
    }
}









