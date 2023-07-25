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

        <div class="container card bg-white page__container page-section mt-5">

            <div class="card-header">
                <div class="row">
                    <!-- Title -->
                    <div class="col-sm-4">
                        <h4 class="content-header-title">Liste des étudiants</h4>
                    </div>

                    <!-- Nombre d'éléments -->
                    <div class="col-sm-4">
                        <h4 class="content-header-title">
                            Nombre d'étudiants
                            <div class="badge badge-glow badge-pill badge-info">{{$etudiants->count()}}</div>
                        </h4>
                    </div>

                    <!-- Buuton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addEtudiant">Nouveau</a>
                        <!--a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#importEtudiant">Importation</a-->
                    </div>
                </div>
            </div>

            <!-- Wrapper -->
            <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Search -->
                <div class="search-form search-form--light mb-3 col-sm-4">
                    <input type="text" class="form-control search" placeholder="Rechercher">
                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                </div>

                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>Numéro Carte</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Classe</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td class="name">{{$etudiant->numero_carte}}</td>
                            <td class="name">{{$etudiant->prenom}}</td>
                            <td class="name">{{$etudiant->nom}}</td>
                            <td class="name">{{$etudiant->telephone}}</td>
                            <td class="name">{{$etudiant->user()->email}}</td>
                            <td class="name">{{$etudiant->inscriptions->last()->classe->nom}}</td>
                            <td class="name">
                                <a href="{{route('admin.etudiants.show', $etudiant->id)}}">
                                    <i class="fa fa-eye text-info mr-1" title="Détail Administrateur"></i>
                                </a>
                                <a href="{{route('admin.etudiants.edit', $etudiant->id)}}">
                                    <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                </a>
                                <!--a href="{{route('admin.etudiants.destroy', $etudiant->id)}}">
                                            <i class="fa fa-address-card-o text-success mr-1" title="Impression Carte"></i>
                                        </a-->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Section Pages Layout -->
        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    @include('template.administration.etudiants.create')
    @include('template.administration.etudiants.import')
    <!-- Modal -->
@endsection

