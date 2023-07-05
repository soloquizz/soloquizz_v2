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
                <ul class="nav nav-tabs row nav-tabs-card">
                    <li class="nav-item col-6">
                        <a class="nav-link active" href="#etudiants" data-toggle="tab">Étudiants</a>
                    </li>
                    <li class="nav-item col-6">
                        <a class="nav-link" href="#cours" data-toggle="tab">Cours</a>
                    </li>
                </ul>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="etudiants">
                        Étudiants
                    </div>
                    <div class="tab-pane" id="cours">
                        Informations Classes
                    </div>
                    <div class="tab-pane" id="compte">
                        Compte
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
@endsection

