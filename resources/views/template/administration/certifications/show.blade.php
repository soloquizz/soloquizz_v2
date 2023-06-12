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
            <div class="card-header">
                <div class="row">
                    <!-- Title -->
                    <div class="col-sm-6">
                        <h3 class="content-header-title">{{$certification->titre}}</h3>
                    </div>

                    <!-- Nombre d'éléments -->
                    <div class="col-sm-2">
                        <h3 class="content-header-title">{{$certification->questions?->count()}} 12 questions</h3>
                    </div>

                    <!-- Bouton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addCertification">Nouvelle question</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection


