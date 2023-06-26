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
            {!! Form::model($anneeScolaire, ['route' => ['admin.anneeScolaires.update', $anneeScolaire->id], 'method' => 'patch']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="code" class="form-control" value="{{$anneeScolaire->code}}" placeholder="2022-2023" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Année
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="annee" class="form-control" value="{{$anneeScolaire->annee}}" placeholder="2023" required="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">État
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="actif">
                                            @if($anneeScolaire->actif)
                                                <option value="1" selected>Actif</option>
                                                <option value="0">Inactif</option>
                                            @else
                                                <option value="1">Actif</option>
                                                <option value="0" selected>Inactif</option>
                                            @endif
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


