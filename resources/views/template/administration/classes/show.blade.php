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

        <div class="container card bg-white page__container mt-4">
            <div class="card-title mt-4">
                <span class="h6">{{$classe->nom}}</span>
            </div>
            <div class="card-body">
                <ul class="nav row nav-tabs-card">
                    <li class="nav-item col-6">
                        <a class="nav-link active justify-content-center" href="#cours" data-toggle="tab">Cours</a>
                    </li>
                    <li class="nav-item col-6">
                        <a class="nav-link justify-content-center" href="#etudiants" data-toggle="tab">Étudiants</a>
                    </li>
                </ul>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="cours">
                        <a href="#" class="btn btn-outline-primary" style="margin-left: 85%!important;" data-toggle="modal" data-target="#addCours">Nouveau cours</a>
                        <div class="row">
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
                                        <th>Image</th>
                                        <th>Libellé</th>
                                        <th>Enseignant</th>
                                        <th>Semestre</th>
                                        <th>État</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($classe->cours as $cour)
                                            <tr>
                                                <td class="name"><img src="{{$cour->image()}}" height="60" alt="course"></td>
                                                <td class="name">{{$cour->nom}}</td>
                                                <td class="name">
                                                    @if(isset($cour->enseignant))
                                                        {{$cour->enseignant?->matricule}} {{$cour->enseignant?->prenom}} {{$cour->enseignant?->nom}}
                                                    @else
                                                        <span class="text-danger">
                                                             Non affecté
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="name">{{$cour->semestre->nom}}</td>
                                                <td class="name">
                                                    @if($cour->etat)
                                                        <span class="text-success">Cours actif</span>
                                                    @else
                                                        <span class="text-danger">Cours inactif</span>
                                                    @endif
                                                </td>
                                                <td class="name">
                                                    <a class="fa-pull-right" href="{{route('admin.cours.edit', $cour->id)}}">
                                                        <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                    </a>
                                                    <a class="fa-pull-right" href="{{route('admin.cours.show', $cour->id)}}">
                                                        <i class="fa fa-eye text-info mr-1" title="Détail Cours"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="etudiants">
                        Étudiants
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    @include('template.administration.cours.create')
    <!-- Modal -->
@endsection

