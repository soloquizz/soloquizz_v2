@extends('layouts.template.administration.master')
@section('css')
<style>
    .pub{
        background-color: green;
        color: white;
        width: max-content;
        padding: 1px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
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

@section('title')
    Détail d'un enseignant
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
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-card row">
                    <li class="nav-item col-3">
                        <a class="nav-link justify-content-center active" href="#infopersonnelles" data-toggle="tab">Informations
                            personnelles</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link justify-content-center" href="#compteuser" data-toggle="tab">Compte
                            Utilisateur</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link justify-content-center" href="#roles" data-toggle="tab">Rôles</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link justify-content-center" href="#permissions" data-toggle="tab">Permissions</a>
                    </li>
                </ul>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="infopersonnelles">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Matricule
                                                </label>
                                                <input type="text" disabled class="form-control" placeholder="matricule"
                                                       value="{{$enseignant->matricule}}">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Prénom
                                                </label>
                                                <input type="text" class="form-control" disabled placeholder="Prénom"
                                                       value="{{$enseignant->prenom}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Nom
                                                </label>
                                                <input type="text" disabled class="form-control" placeholder="nom"
                                                       value="{{$enseignant->nom}}">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Téléphone
                                                </label>
                                                <input type="text" class="form-control" disabled placeholder="Téléphone"
                                                       value="{{$enseignant->telephone}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Email Institutionnel
                                                </label>
                                                <input type="text" disabled class="form-control"
                                                       value="{{$enseignant->user()->email}}"
                                                       placeholder="Email Institutionnel">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Email Personnel
                                                </label>
                                                <input type="text" disabled class="form-control"
                                                       value="{{$enseignant->email_personnel}}"
                                                       placeholder="Email Personnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="compteuser">
                        <form method="POST" action="{{ route('admin.users.update') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="">
                                            <div class="form-row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Email Institutionnel
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="email" class="form-control"
                                                           placeholder="pre" value="{{$enseignant->user()->email}}"
                                                           required="">
                                                           <input type="hidden" name="user_id"
                                                           value="{{$enseignant->user()->id}}">
                                                </div>
                                                <!--<div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Password
                                                    </label>
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="Password">
                                                </div>-->
                                            </div>
                                            <div class="form-row">
                                                {{--<div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Password Confirmation
                                                    </label>
                                                    <input type="password" name="password_confirmed"
                                                           class="form-control" placeholder="Password">
                                                    <input type="hidden" name="user_id"
                                                           value="{{$enseignant->user()->id}}">
                                                </div>--}}
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="flex">
                                                       
                                                        <label class="form-label" for="subscribe">Activation
                                                            compte</label><br>
                                                        
                                                        <div class="mr-1">
                                                            <label>Activé</label>
                                                            <input type="radio" name="etat" value="1" {{ $enseignant->user()->etat == 1 ? 'checked' : '' }}>
                                                            <label>Désactivé</label>
                                                            <input type="radio" name="etat" value="0" {{ $enseignant->user()->etat == 0 ? 'checked' : '' }}>
                                                        </div>
                                                       
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="historiqueactivite">
                        Historiques
                    </div>
                    <div class="tab-pane" id="roles">
                        <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>
                            <!-- Table -->
                            <table id="myTable" class="table">
                                <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($roles as $role)
                                    <tr>
            
                                        <td class="name">{{$role->name}}</td>
                                        <td class="name">
                                            @if($enseignant->user()->hasRole($role->name))
                                                <span class="pub rounded-pill border border-4 mr-1">Assigné</span>
                                            @else
                                                <span class="pub2 rounded-pill border border-4 mr-1">Non Assigné</span>
                                            @endif

                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('admin.assignRole')}}">
                                                @csrf
                                                <input type="hidden" value="{{$enseignant->user()->id}}" name="model_id">
                                                <input type="hidden" value="{{$role->id}}" name="role_id">
                                                <button type="submit" class="btn">
                                                    <i class="fa fa-user-plus text-info" aria-hidden="true" title="Ajout-user"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="permissions">
                        Permissions
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->
        @include('layouts.template.footer')
    </div>
@endsection


