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
                            <div class="badge badge-glow badge-pill badge-info">{{$certification->count()}}</div>
                        </h3>
                    </div>

                    <!-- Bouton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addCertification">Nouvelle
                            certification</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Table -->
                <table id="myTable" class="table">
                    <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>Nombre total de Dump</th>
                        <th>Score Total </th>
                        <th>Détail</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($dumpUser as $user)
                        <tr>
                            <td class="name">{{$user->etudiant_prenom}} {{$user->etudiant_nom}} </td>
                            <td class="name">{{$user->dump}}</td>
                            <td class="name">{{$user->score_final}}</td>
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
        function submitShow() {
            $('#showForm').submit();
        }
    </script>
@endsection

