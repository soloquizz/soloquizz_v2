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
                <div class="col-sm-4">
                    <h3 class="content-header-title">Liste des domaines</h3>
                </div>

                <!-- Nombre d'éléments -->
                <div class="col-sm-4">
                    <h3 class="content-header-title">Nombre de domaines {{$domaines->count()}}</h3>
                </div>

                <!-- Bouton -->
                <div class="col-sm-4 text-right">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addDomaine">Nouveau domaine</a>
                </div>
            </div>
        </div>

        <!-- Wrapper -->
        <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

            <!-- Search -->
            <div class="search-form search-form--light mb-3 col-sm-4">
                <input type="text" class="form-control search" placeholder="Rechercher">
                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
            </div>

            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom du domaine</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                @foreach($domaines as $domaine)
                    <tr>
                        <td class="name">{{$domaine->nom}}</td>
                        <td class="name">
                            <a href="{{route('admin.domaines.edit', $domaine->id)}}">
                                <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- END Section Pages Layout -->

    @include('layouts.template.footer')
</div>
@endsection

<!-- Modal -->
@include('template.administration.domaines.create')

<!-- Modal -->

