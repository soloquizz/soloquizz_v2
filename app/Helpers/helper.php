<?php

use \App\Models\Administration\Etudiant;
use \App\Models\Administration\Certification;

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
        return Certification::count();
    }
}







