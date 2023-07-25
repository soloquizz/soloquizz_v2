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
            {!! Form::model($niveau, ['route' => ['admin.niveaux.update', $niveau->id], 'method' => 'patch']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Nom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="nom" value="{{$niveau->nom}}" class="form-control"
                                           placeholder="Licence 1" required="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Nombre d'années
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="annee" value="{{$niveau->annee}}" class="form-control"
                                           placeholder="2" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">Parcours
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="parcour_id">
                                        @foreach($parcours as $parcour)
                                            <option value="{{$parcour->id}} {{$parcour->id == $niveau->parcour->id ? 'selected' : ''}}">{{$parcour->nom}}</option>
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


