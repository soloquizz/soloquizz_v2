@extends('layouts.template.administration.master')

@section('css')

    <!--Datatables-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/quill.rtl.css')}}" rel="stylesheet">
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

        <div class="row mt-3 justify-content-center">
            @include('adminlte-templates::common.errors')

        </div>

        <div class="container page__container">
            <div class="page-section">
               
                <div class="container card bg-white page__container page-section">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" href="#roles" onclick="switchTabRoles()" data-toggle="tab">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#permissions" onclick="switchTabPermissions()" data-toggle="tab">Permissions</a>
                        </li>
                        <div class="fa-pull-right mb-3">

                            <a href="#" class="btnTab btn btn-outline-primary ml-5" id="btnRole"
                               data-toggle="modal"
                               data-target="#addRole">Nouveau role</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3 ml-3" id="btnPermission"
                               data-toggle="modal"
                               data-target="#addPermission">Nouvelle permission
                            </a>

                        </div>
                    </ul>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="roles">
                            <div class="row">                       
                                <table class="table" id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody class="list">
                                            @foreach($roles as $role)
                                                <tr>
                                                    <td class="name">{{$role->name}}</td>
                                                    <td class="name">
                                                        <a href="{{route('admin.roles.edit', $role->id)}}">
                                                            <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>                                                            
                                                            
                            </div>
                        </div>
                        <!--Parcours space-->
                        <div class="tab-pane" id="parcours">
                            <div class="row">
                                <table class="table" id="myTable2">
                                    <thead>
                                    <tr>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    {{--@foreach($parcours as $parcour)
                                        <tr>
                                            <td class="name">{{$parcour->nom}}</td>
                                            <td class="name">
                                                <a href="{{route('admin.parcours.edit', $parcour->id)}}">
                                                    <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

@section('modal')
    @include('template.administration.roles.create')
   
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/image-resize.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script>
        //switch selon les boutons appuyés
        $('document').ready(function () {
            $('.btnTab').hide();
            switchTabRoles();
        })

        function switchTabRoles() {
            $('.btnTab').hide();
            $('#btnRole').show();
        }

        function switchTabPermissions() {
            $('.btnTab').hide();
            $('#btnPermission').show();
        }
         
         $(document).ready(function(){
            var table1 = new DataTable('#myTable1', {
            language: {
                 url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
            },           
         });
         var table2 = new DataTable('#myTable2', {
            language: {
                 url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json',
            },           
         });
          
         })
         

       
    </script>
@endsection

