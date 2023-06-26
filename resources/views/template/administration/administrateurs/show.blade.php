@extends('layouts.template.administration.master')

@section('title')
    Détail d'un administrateur
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
                        <a class="nav-link justify-content-center active" href="#infopersonnelles" data-toggle="tab">Informations personnelles</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link justify-content-center" href="#compteuser" data-toggle="tab">Compte Utilisateur</a>
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
                                                <input type="text" disabled class="form-control" placeholder="matricule" value="{{$administrateur->matricule}}" required="">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Prénom
                                                </label>
                                                <input type="text" class="form-control" disabled placeholder="Prénom" value="{{$administrateur->prenom}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Nom
                                                </label>
                                                <input type="text" disabled class="form-control" placeholder="nom" value="{{$administrateur->nom}}" required="">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label" >Téléphone
                                                </label>
                                                <input type="text" class="form-control" disabled placeholder="Téléphone" value="{{$administrateur->telephone}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Email Institutionnel
                                                </label>
                                                <input type="text" disabled class="form-control" value="{{$administrateur->user()->email}}" placeholder="Email Institutionnel">
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label class="form-label">Email Personnel
                                                </label>
                                                <input type="text" disabled class="form-control" value="{{$administrateur->email_personnel}}" placeholder="Email Personnel">
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
                                                    <input type="text" name="email" class="form-control" placeholder="pre" value="{{$administrateur->user()->email}}" required="">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Password
                                                    </label>
                                                    <input type="password" name="password" class="form-control"  placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-12 col-md-6 mb-3">
                                                    <label class="form-label">Password Confirmation
                                                    </label>
                                                    <input type="password" name="password_confirmed" class="form-control"  placeholder="Password">
                                                    <input type="hidden" name="user_id" value="{{$administrateur->user()->id}}">
                                                </div>
                                                <div class="col-12 col-md-6 mb-3">
                                                    <div class="flex">
                                                        <label class="form-label" for="subscribe">Activation compte</label><br>
                                                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                            <input checked="" type="checkbox" id="subscribe" class="custom-control-input">
                                                            <label class="custom-control-label" for="subscribe">Actif</label>
                                                        </div>
                                                        <label class="form-label mb-0" for="subscribe">Actif</label>
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
                        Rôles
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


