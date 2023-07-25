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
            {!! Form::model($certification, ['route' => ['admin.certifications.update', $certification->id], 'method' => 'patch']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Code
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="code" value="{{$certification->code}}" class="form-control"
                                           placeholder="010-160" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Titre
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="titre" value="{{$certification->titre}}"
                                           class="form-control" placeholder="NDG LINUX Essential" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Éditeur
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="editeur_id">
                                        @foreach($editeurs as $editeur)
                                            <option value="{{$editeur->id}}" {{$certification->editeur->id == $editeur->id ? 'selected' : ''}}>{{$editeur->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Niveau
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="niveau_id">
                                        @foreach($niveaux as $niveau)
                                            <option value="{{$niveau->id}}" {{$certification->niveau->id == $niveau->id ? 'selected' : ''}}>{{$niveau->nom}}</option>
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
            {!! Form::close() !!}
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection


