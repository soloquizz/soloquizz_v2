@extends('layouts.template.administration.master')

@section('css')
 <!--Datatables-->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 <style>
    .pub{
        background-color: green;
        color: white;
    }
    .pub3{
        background-color: rgb(137, 14, 137);
        color: white;
    }
    .pub2{
        background-color: rgb(246, 4, 16);
        color: white;
        width: max-content;
        padding: 1px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
    }
</style>
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

            <div class="card-header">
                <div class="row">
                    <!-- Title -->
                    <div class="col-sm-4">
                        <h3 class="content-header-title">Liste des certifications</h3>
                    </div>

                    <!-- Nombre d'éléments -->
                    <div class="col-sm-4">
                        <h3 class="content-header-title">Nombre de certifications
                            <div class="badge badge-glow badge-pill badge-info">{{$certifications->count()}}</div>
                        </h3>
                    </div>

                    <!-- Bouton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addCertification">Nouvelle
                            certification</a>
                    </div>
                </div>
            </div>

            <!-- Wrapper -->
            <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Table -->
                <table id="myTable" class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Titre</th>
                        <th>Éditeur</th>
                        <th>Niveau</th>
                        <th>Action</th>
                        <th>Etudiants</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($certifications as $certification)
                        <tr>
                            <td class="name">{{$certification->code}}</td>
                            <td class="name">{{$certification->titre}}</td>
                            <td class="name">{{$certification->editeur->nom}}</td>
                            <td class="name">{{$certification->niveau->nom}}</td>
                            <td class="name">
                                <div class="row">
                                    <div class="col-2">
                                        <form method="POST" id="showForm"
                                              action="{{ route('admin.certifications.questions.search') }}">
                                            @csrf
                                            <a href="#" onclick="submitShow({{$certification->id}})">
                                                <i class="fa fa-eye text-info mr-1" title="Voir détail"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{route('admin.certifications.edit', $certification->id)}}">
                                            <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        @if ($certification->statut==1)
                                            <span class="pub2 rounded-pill border border-4 mr-1">Déjà Publié</span>
                                        <!--<span class="pub2 rounded-pill border border-4 mr-1">Déjà Publié</span>-->
                                        <form method="POST" action="{{route('admin.certifications.depublier.statut', $certification->id)}}">
                                            @csrf
                                            <input type="submit" class="pub3 rounded-pill border border-4 mr-1" value="Publier le">
                                        </form>
                                        @else
                                            <form method="POST" action="{{route('admin.certifications.update.statut', $certification->id)}}">
                                                @csrf
                                                <input type="submit" class="pub rounded-pill border border-4 mr-1" value="Publier">
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="name">
                                <a href="{{route('admin.certifications.list.etudiants', $certification->id)}}">
                                    <i class="fa fa-users text-success" title="Mofification"></i>
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
@section('modal')
    @include('template.administration.certifications.create')
@endsection
<!-- Modal -->

@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
         $(document).ready(function(){
            var table = new DataTable('#myTable', {
            language: {
                 url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
            },           
         });
         });
        function submitShow(certification_id) {
            $('#showForm').append("<input type='hidden' value='"+certification_id+"' name='certification_id'>");
            $('#showForm').submit();
        }
    </script>
@endsection

