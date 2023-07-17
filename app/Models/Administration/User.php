<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'personne_type',
        'personne_id',
        'password_change',
        'etat'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function personne()
    {
        if ($this->personne_type == 'Administrateur'){
            return Administrateur::find($this->personne_id);
        }
        if ($this->personne_type == 'Etudiant'){
            return Etudiant::find($this->personne_id);
        }

        if ($this->personne_type == 'Enseignant'){
            return Enseignant::find($this->personne_id);
        }

    }

    public function etudiant()
    {
        return Etudiant::find($this->personne_id);
    }

    public function enseignant()
    {
        return Enseignant::find($this->personne_id);
    }

    public function getFullName()
    {
        return $this->personne()->prenom.' '.$this->personne()->nom;
    }
}
