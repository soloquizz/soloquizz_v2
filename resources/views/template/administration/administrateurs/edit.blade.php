@extends('layouts.template.administration.master')

@section('title')
    Modification administrateur
@endsection

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
            {!! Form::model($administrateur, ['route' => ['admin.administrateurs.update', $administrateur->id], 'method' => 'patch']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Matricule
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="matricule" class="form-control" placeholder="matricule"
                                           value="{{$administrateur->matricule}}" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Prénom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="prenom" placeholder="Prénom"
                                           value="{{$administrateur->prenom}}" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Nom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nom" class="form-control" placeholder="nom"
                                           value="{{$administrateur->nom}}" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Téléphone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="telephone" placeholder="Téléphone"
                                           value="{{$administrateur->telephone}}" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Personnel
                                    </label>
                                    <input type="text" name="email_personnel" class="form-control"
                                           value="{{$administrateur->email_personnel}}" placeholder="Email Personnel">
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


