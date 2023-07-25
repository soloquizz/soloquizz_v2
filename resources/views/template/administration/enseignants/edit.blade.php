@extends('layouts.template.administration.master')

@section('title')
    Modification enseignant
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
            {!! Form::model($enseignant, ['route' => ['admin.enseignants.update', $enseignant->id], 'method' => 'patch']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Matricule
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="matricule" class="form-control"
                                           value="{{$enseignant->matricule}}" placeholder="matricule" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Prénom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="prenom"
                                           value="{{$enseignant->prenom}}" placeholder="Prénom" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Nom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nom" class="form-control" value="{{$enseignant->nom}}"
                                           placeholder="nom" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Téléphone
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="telephone"
                                           value="{{$enseignant->telephone}}" placeholder="Téléphone" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Institutionnel</label>
                                    <input type="text" name="email" class="form-control"
                                           value="{{$enseignant->user()->email}}" placeholder="prenom1.nom@cat.edu.sn">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Personnel</label>
                                    <input type="text" name="email_personnel" value="{{$enseignant->email_personnel}}"
                                           class="form-control" placeholder="Email Personnel">
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


