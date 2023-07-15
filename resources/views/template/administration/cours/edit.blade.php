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
            {!! Form::model($cours, ['route' => ['admin.cours.update', $cours->id], 'method' => 'patch','files'=> true]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Libellé
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="nom" value="{{$cours->nom}}" class="form-control" placeholder="Développement Web" required>
                                        <input type="hidden" name="classe_id" value="{{$cours->classe_id}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Semestre
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="semestre_id" required>
                                            @foreach($semestres as $semestre)
                                                <option value="{{$semestre->id}}" {{$cours->semestre_id == $semestre->id ? 'selected' : ''}}>{{$semestre->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
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


