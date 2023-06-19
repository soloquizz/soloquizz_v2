@extends('layouts.template.etudiant.master')


@section('content_page')
    <div class="mdk-header-layout__content page-content">
        <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
            <div class="mdk-box__content">
                <div class="py-64pt text-center text-sm-left">
                    <div class="container d-flex flex-column justify-content-center align-items-center">
                        <p class="lead text-white-50 measure-lead-max mb-0">text avertissement</p>
                        <h1 class="text-white mb-24pt">{{$certification->titre}}</h1>
                        <a href="{{route('etudiant.dumps.take',$certification->id)}}" class="btn btn-outline-white">Nouveau entrainement</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-sm navbar-light navbar-submenu navbar-list p-0 m-0 align-items-center">
            <div class="container page__container">
                <ul class="nav navbar-nav flex align-items-sm-center">
                    <li class="nav-item navbar-list__item">350/450 Score</li>
                    <li class="nav-item text-danger navbar-list__item">
                        <i class="material-icons text-muted icon--left">assessment</i>
                        10% Intermediaire
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="fa fa-question mr-2"></i>
                        120/250 questions traitées
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="fa fa-check text-success mr-2"></i>
                        90 questions trouvées
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="fa fa-times text-danger mr-2"></i>
                        30 questions fauchées
                    </li>

                </ul>
            </div>
        </div>
        <div class="container page__container">

        </div>
    </div>
@endsection
