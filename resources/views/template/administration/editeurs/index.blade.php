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
                    <h3 class="content-header-title">Liste des editeurs</h3>
                </div>

                <!-- Nombre d'éléments -->
                <div class="col-sm-4">
                    <h3 class="content-header-title">Nombre d'editeurs {{$editeurs->count()}}</h3>
                </div>

                <!-- Bouton -->
                <div class="col-sm-4 text-right">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addAdmin">Nouveau editeur</a>
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
                        <th>Image</th>
                        <th>Nom de l'éditeur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                @foreach($editeurs as $editeur)
                    <tr>
                        <td class="name"><img src="{{$editeur->image()}}" style="height: 64px; width: 64px;"></td>
                        <td class="name">{{$editeur->nom}}</td>
                        <td class="name">
                            <a href="{{route('admin.editeurs.edit', $editeur->id)}}">
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
@include('template.administration.editeurs.create')

<!-- Modal -->

