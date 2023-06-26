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

        <div class="row justify-content-center mt-5">
            @include('adminlte-templates::common.errors')
        </div>

        <div class="container card bg-white page__container page-section mt-5">
            {!! Form::model($etudiant, ['route' => ['admin.etudiants.update', $etudiant->id], 'method' => 'patch']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Numéro Carte
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="numero_carte" value="{{$etudiant->numero_carte}}" class="form-control" placeholder="matricule" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Prénom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="prenom" value="{{$etudiant->prenom}}" placeholder="Prénom" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Nom
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nom" value="{{$etudiant->nom}}" class="form-control" placeholder="nom" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" >Téléphone
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="telephone" value="{{$etudiant->telephone}}" placeholder="Téléphone" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Email Institutionnel
                                        </label>
                                        <input type="text" name="email" class="form-control" value="{{$etudiant->user()->email}}" placeholder="prenom1.nom@cat.edu.sn">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Email Personnel</label>
                                        <input type="text" name="email_personnel" class="form-control" value="{{$etudiant->email_personnel}}" placeholder="Email Personnel">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

