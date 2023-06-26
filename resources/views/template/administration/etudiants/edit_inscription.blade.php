@extends('layouts.template.administration.master')

@section('content_page')
    <div class="mdk-header-layout__content page-content">
        <!-- Header Layout -->
        @include('layouts.template.administration.header')
        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.administration.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <!-- Section Dashboard Layout -->
        @include('template.administration.dashboard')
        <!-- END Section Dashboard Layout -->

        <div class="row justify-content-center">
            @include('adminlte-templates::common.errors')
        </div>

        <div class="container card bg-white page__container page-section mt-4">
            <form method="POST" action="{{ route('admin.etudiants.update_inscription') }}">
                @csrf
                <div class="">
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Numéro Carte
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" disabled class="form-control" value="{{$etudiant->numero_carte}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Prénom
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" disabled value="{{$etudiant->prenom}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Nom
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" disabled value="{{$etudiant->nom}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label" >Téléphone
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" disabled value="{{$etudiant->telephone}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Email Institutionnel</label>
                            <input type="text" class="form-control" value="{{$etudiant->user()->email}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Email Personnel</label>
                            <input type="text"  class="form-control" value="{{$etudiant->email_personnel}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Classes</label>
                            <select required class="form-control" name="classe_id">
                                <option>Choisir une classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{$classe->id}}" {{$classe->id == $inscription->classe->id ? 'selected' : ''}}>{{$classe->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label">Années Scolaires
                            </label>
                            <select required class="form-control" name="annee_scolaire_id">
                                <option>Choisir une année universitaire</option>
                                @foreach($annee_scolaires as $annee_scolaire)
                                    <option value="{{$annee_scolaire->id}}" {{$annee_scolaire->id == $inscription->anneeScolaire->id ? 'selected' : ''}}>{{$annee_scolaire->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden"  class="form-control" name="etudiant_id" value="{{$etudiant->id}}">
                        <input type="hidden"  class="form-control" name="inscription_id" value="{{$inscription->id}}">
                    </div>
                    <div class="form-row">
                        <label class="form-label">État de l'inscription</label>
                        <select required class="form-control" name="etat">
                            <option>Choisir un état d'inscription</option>
                            <option value="En cours" {{$inscription->etat == 'En cours' ? 'selected' : ''}}>En cours</option>
                            <option value="Abandonnée" {{$inscription->etat == 'Abandonnée' ? 'selected' : ''}}>Abandonnée</option>
                            <option value="Terminée" {{$inscription->etat == 'Terminée' ? 'selected' : ''}}>Terminée</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                </div>
            </form>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

