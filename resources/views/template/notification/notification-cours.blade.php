<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CURSUS - Module de Gestion des Inscriptions et Réinscription">
    <meta name="keywords" content="Inscription, Réinscription, Demande, Carte etudiant">
    <meta name="author" content="DASN UVS">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <title>Soloquizz - Compte</title>

    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700"
            rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom Gestion Footer include CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" />
    <!-- END Custom CSS-->
</head>

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns menu-expanded" data-open="hover"
      data-menu="horizontal-menu" data-col="2-columns">

<div id="wrap" class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container mt-5">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-8 col-12 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img height="50" src="{{asset('/assets/images/logo/Soloquizz.png')}}" alt="branding logo">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p><h4>Chers étudiants de la classe <strong>{{$cours_data['classe']}}</strong></h4></p>
                                    <p><h4>Un nouveau support de cours est disponible pour le cours de <strong>{{$cours_data['nom_cours']}}</strong>. Rendez-vous sur:<br>
                                         <a href="{{env('APP_URL')}}">{{env('APP_URL')}}</a>
                                        </h4> 
                                    </p>
                                    <p>Cordialement,<br>L'équipe SoloQuizz</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img class="navbar-brand-icon mr-0 mr-md-8pt" src="{{asset('/assets/images/logo/Soloquizz 3  transparent.png')}}" width="200" alt="Soloquizz">
                            <span class="d-none d-md-block"></span>
                        </a>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <p class="text-white-50 mb-0">Copyright &copy; edutech <script>document.write(new Date().getFullYear());</script> Tous droits réservés.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


</html>


