@extends('layouts.template.administration.master')
@section('css')
 <!--Datatables-->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

@endsection

@section('title')
    Liste des enseignants
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

        <div class="row justify-content-center mt-5">
            @include('adminlte-templates::common.errors')
        </div>

        <div class="container card bg-white page__container page-section mt-5">

            <div class="card-header">
                <div class="row">
                    <!-- Title -->
                    <div class="col-sm-4">
                        <h3 class="content-header-title">Liste des enseignants</h3>
                    </div>

                    <!-- Nombre d'éléments -->
                    <div class="col-sm-4">
                        <h4 class="content-header-title">Nombre d'enseignants
                            <div class="badge badge-glow badge-pill badge-info">{{$enseignants->count()}}</div>
                        </h4>
                    </div>

                    <!-- Buuton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addEnseignant">Nouveau
                            Enseignant</a>
                    </div>
                </div>
            </div>

            <!-- Wrapper -->
            <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>
                <!-- Table -->
                <table id="myTable" class="table">
                    <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($enseignants as $enseignant)
                        <tr>
                            <td class="name">{{$enseignant->matricule}}</td>
                            <td class="name">{{$enseignant->prenom}}</td>
                            <td class="name">{{$enseignant->nom}}</td>
                            <td class="name">{{$enseignant->telephone}}</td>
                            <td class="name">{{$enseignant->user()->email}}</td>
                            <td class="name">
                                <a href="{{route('admin.enseignants.show', $enseignant->id)}}">
                                    <i class="fa fa-eye text-info mr-1" title="Détail Administrateur"></i>
                                </a>
                                <a href="{{route('admin.enseignants.edit', $enseignant->id)}}">
                                    <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                </a>
                                <!--a href="{{route('admin.administrateurs.destroy', $enseignant->id)}}">
                                            <i class="fa fa-address-card-o text-success mr-1" title="Impression Carte"></i>
                                        </a-->
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

@section('modal')
    <!-- Modal -->
    @include('template.administration.enseignants.create')
    <!-- Modal -->
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
 <script>
      $(document).ready(function(){
           $('#myTable').DataTable();
         })

 </script>
@endsection


