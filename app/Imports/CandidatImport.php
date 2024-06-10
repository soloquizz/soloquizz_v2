<?php

namespace App\Imports;

use App\Models\Administration\Candidats;
use App\Models\Administration\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CandidatImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        foreach ($collections as $collection){
            if (isset($collection['email']) and empty(Candidats::where('email',$collection['email'])->first())){
                $candidatData['prenom'] = $collection['prenoms'] ?? 'Non renseigné';
                $candidatData['nom'] = $collection['nom'] ?? 'Non renseigné';
                $candidatData['telephone'] = $collection['telephone'] ?? 'Non renseigné';
                $candidatData['email'] = $collection['email'] ?? 'Non renseigné';
                $candidatData['pays_residance'] = $collection['pays_residance'] ?? 'Non renseigné';
                $candidatData['niveau_etude'] = $collection['niveau_etude'] ?? 'Non renseigné';
                $candidat = Candidats::create($candidatData);
                $userData['email'] = $candidat->email;
                $userData['password'] = bcrypt("cat062024");
                $userData['password_change'] =1;
                $userData['personne_type'] ="Candidat";
                $userData['personne_id'] = $candidat->id;
                User::create($userData);
            }
        }
    }
}
