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
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-card">
                    <li class="nav-item">
                        <a class="nav-link active" href="#info_etudiant" data-toggle="tab">Informations étudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#inscriptions" data-toggle="tab">Inscriptions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#compte" data-toggle="tab">Informations compte</a>
                    </li>
                </ul>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="info_etudiant">
                        <div class="">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Numéro Carte
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" disabled value="{{$etudiant->numero_carte}}" class="form-control" placeholder="matricule">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Prénom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" disabled value="{{$etudiant->prenom}}" placeholder="Prénom">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Nom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" disabled value="{{$etudiant->nom}}" class="form-control" placeholder="nom">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" >Téléphone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" disabled value="{{$etudiant->telephone}}" placeholder="Téléphone">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Institutionnel
                                    </label>
                                    <input type="text" disabled class="form-control" value="{{$etudiant->user()->email}}" placeholder="prenom1.nom@cat.edu.sn">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Personnel</label>
                                    <input type="text" disabled class="form-control" value="{{$etudiant->email_personnel}}" placeholder="Email Personnel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="inscriptions">
                        <div class="row fa-pull-right">
                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addInscription">Nouvelle</a>
                        </div>

                        <!-- Table -->
                        <div class="row">
                            <table class="table mt-5">
                                <thead>
                                <tr>
                                    <th>Année Universitaire</th>
                                    <th>Classe</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($etudiant->inscriptions as $inscription)
                                    <tr>
                                        <td class="name">{{$inscription->anneeScolaire->code}}</td>
                                        <td class="name">{{$inscription->classe->nom}}</td>
                                        <td class="name">
                                            <a href="{{route('admin.etudiants.edit_inscription', $inscription->id)}}">
                                                <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="compte">
                        Compte
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
    @include('template.administration.etudiants.create_inscription')
@endsection

