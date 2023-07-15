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
                <span class="h6">{{$cours->classe->nom}} / {{$cours->nom}}</span>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs row nav-tabs-card">
                    <li class="nav-item col-4">
                        <a class="nav-link justify-content-center active" href="#affectation" data-toggle="tab">Affectation cours enseignant</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link justify-content-center" href="#activation" data-toggle="tab">Activation cours</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link justify-content-center" href="#historiques" data-toggle="tab">Historiques Affectations</a>
                    </li>
                </ul>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="affectation">
                        <form method="POST" action="{{ route('admin.cours.enseignant_store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="form-row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Enseignant
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control" name="enseignant_id">
                                                        @foreach($enseignants as $enseignant)
                                                            <option value="{{$enseignant->id}}" {{$cours->enseignant?->id == $enseignant->id ? 'selected':''}}>{{$enseignant->matricule}} {{$enseignant->prenom}} {{$enseignant->nom}} {{$enseignant->telephone}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="cours_id" value="{{$cours->id}}">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Année Scolaires
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select class="form-control" name="annee_scolaire_id">
                                                        @foreach($annee_scolaires as $annee_scolaire)
                                                            <option value="{{$annee_scolaire->id}}">{{$annee_scolaire->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="activation">
                        @if($cours->etat)
                            <div class="row">
                                <div class="col-3">
                                    <span class="text-success">Cours actif</span>
                                </div>
                                <div class="col-3">
                                    {!! Form::model($cours, ['route' => ['admin.cours.update', $cours->id], 'method' => 'patch']) !!}
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <button type="submit" title="Actif" class="btn btn-outline-danger">Désactiver</button>
                                        <input type="hidden" name="etat" value="0">
                                        <input type="hidden" name="nom" value="{{$cours->nom}}">
                                        <input type="hidden" name="classe_id" value="{{$cours->classe_id}}">
                                        <input type="hidden" name="semestre_id" value="{{$cours->semestre_id}}">
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-3">
                                    <span class="text-danger">Cours inactif</span>
                                </div>
                                <div class="col-3">
                                    {!! Form::model($cours, ['route' => ['admin.cours.update', $cours->id], 'method' => 'patch']) !!}
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <button type="submit" title="Inactif" class="btn btn-outline-success">Activer</button>
                                        <input type="hidden" name="etat" value="1">
                                        <input type="hidden" name="nom" value="{{$cours->nom}}">
                                        <input type="hidden" name="classe_id" value="{{$cours->classe_id}}">
                                        <input type="hidden" name="semestre_id" value="{{$cours->semestre_id}}">
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="historiques">

                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection


