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
            {!! Form::model($editeur, ['route' => ['admin.editeurs.update', $editeur->id], 'method' => 'patch','files'=> true]) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Nom Éditeur
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nom" class="form-control" value="{{$editeur->nom}}"
                                           placeholder="Python Institute" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="logo" class="form-control">
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

<!-- Modal -->
@include('template.administration.editeurs.create')

<!-- Modal -->


