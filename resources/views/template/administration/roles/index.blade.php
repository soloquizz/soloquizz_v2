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
                        <h3 class="content-header-title">Liste des roles</h3>
                    </div>

                    <!-- Nombre d'éléments -->
                    <div class="col-sm-4">
                        <h4 class="content-header-title">Nombre de roles
                            <div class="badge badge-glow badge-pill badge-info">{{$roles->count()}}</div>
                        </h4>
                    </div>

                    <!-- Bouton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addRole">Nouveau
                            role</a>
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
                        <th>Nom du role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($roles as $role)
                            <tr>
                                <td class="name">{{$role->name}}</td>
                                
                                <td> 
                                    <a href="{{route('admin.roles.show',$role->id)}}">
                                        <i class="fa fa-eye text-info" title="Ajout-permission"></i>
                                    </a>
                                   
                                    {{--<a href="#revokePermission{{$role->id}}" data-toggle="modal" data-backdrop="false">
                                        <i class="fa fa-trash text-danger mr-1" title="retirer-permission"></i>
                                    </a>
                                    {{ str_replace(array('[',']','"'),' ', $role->permissions()?->pluck('name')) }}</td>--}}
                                
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

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
    <!-- Modal -->
    @include('template.administration.roles.create')
         <!-- Modal -->
@endsection
