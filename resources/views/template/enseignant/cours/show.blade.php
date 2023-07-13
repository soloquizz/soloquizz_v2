@extends('layouts.template.enseignant.master')

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.enseignant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.enseignant.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <div class="row mt-3 justify-content-center">
            @include('adminlte-templates::common.errors')
        </div>

        <div class="container page__container">
            <div class="page-section">
                <div class="page-heading">
                    <span class="mr-16pt">
                        <img src="{{$cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <h4>{{$cours->nom}}</h4>
                </div>
                <div class="container card bg-white page__container page-section">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" href="#seances" onclick="switchTabSeance()" data-toggle="tab">Séances</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ressources" onclick="switchTabRessources()" data-toggle="tab">Ressources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#td" onclick="switchTabTd()" data-toggle="tab">Exercices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#evaluations" onclick="switchTabEvaluations()" data-toggle="tab">Évaluations</a>
                        </li>
                        <div class="fa-pull-right mb-3">
                            <a href="#" class="btnTab btn btn-outline-primary" id="btnSeance" style="margin-left: 225%!important; width: 170px!important;" data-toggle="modal" data-target="#addSeance">Nouvelle séance</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3" id="btnRessource" style="margin-left: 215%!important; width: 180px!important;" data-toggle="modal" data-target="#addRessource">Nouvelle ressource</a>
                        </div>
                    </ul>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="seances">
                            <div class="row">
                                @foreach($cours->seances as $seance)
                                    <div class="col-sm-6">
                                        <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                                <div class="overlay">
                                                            <span class="overlay__content overlay__content-transparent">
                                                            <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                                </div>
                                                            </div>
                                                            <div class="flex">
                                                                <div class="card-title text-body mb-0">{{$seance->titre}}</div>
                                                                <div class="text-muted d-flex lh-1">
                                                                    {{date('d-m-Y', strtotime($seance->date)) }} entre {{$seance->heure_debut}} - {{$seance->heure_fin}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="path.html" class="ml-4pt btn btn-link text-secondary">Contenus</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="card-header">
                                                <a href="" class="fa-pull-right"><i class="fa fa-edit text-info text-70"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6>Ressource</h6>
                                                    <a href="">
                                                        <img height="40" src="{{asset('assets/images/icon/icone_pdf.png')}}">
                                                        <a class="text-primary" href="">Support</a>
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <h6>Exercices</h6>
                                                    <a class="text-primary" href="">18 questions</a>
                                                    <div class="text-muted d-flex lh-1">12/20</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="h6">Lien cours en ligne</span>
                                                    <a class="text-primary" target="_blank" href="https://meet.google.com/iek-quua-yiy">https://meet.google.com/iek-quua-yiy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane " id="ressources">
                            <div class="row">
                                <div class="col-3">
                                    <div class="card text-center">
                                        <a href="">
                                            <img height="100" src="{{asset('assets/images/icon/icone_pdf.png')}}">
                                        </a>
                                        <div class="card-footer">
                                            <a href="student-billing-invoice.html">Introduction à la <i class="icon--right material-icons">file_download</i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card text-center">
                                        <a href="">
                                            <img height="100" src="{{asset('assets/images/icon/word_icone.png')}}">
                                        </a>
                                        <div class="card-footer">
                                            Les bases de Java <i class="icon--right material-icons">file_download</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card text-center">
                                        <a href="">
                                            <img height="100" src="{{asset('assets/images/icon/video_icone.png')}}">
                                        </a>
                                        <div class="card-footer">
                                            Les bases de Java <i class="icon--right material-icons">file_download</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card text-center">
                                        <a href="">
                                            <img height="100" src="{{asset('assets/images/icon/video_icone.png')}}">
                                        </a>
                                        <div class="card-footer">
                                            Les bases de Java <i class="icon--right material-icons">file_download</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card text-center">
                                        <a href="">
                                            <img height="100" src="{{asset('assets/images/icon/video_icone.png')}}">
                                        </a>
                                        <div class="card-footer">
                                            Les bases de Java <i class="icon--right material-icons">file_download</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card text-center">
                                        <a href="">
                                            <img height="100" src="{{asset('assets/images/icon/video_icone.png')}}">
                                        </a>
                                        <div class="card-footer">
                                            Les bases de Java <i class="icon--right material-icons">file_download</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="td">
                            Compte td
                        </div>
                        <div class="tab-pane" id="evaluations">
                            Compte
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
    @include('template.enseignant.seances.create')
    @include('template.enseignant.ressources.create')
@endsection


@section('script')
    <script>

        $('document').ready(function (){
            $('.btnTab').hide();
            switchTabSeance();
        })

        function switchTabSeance()
        {
            $('.btnTab').hide();
            $('#btnSeance').show();
        }

        function switchTabRessources()
        {
            $('.btnTab').hide();
            $('#btnRessource').show();
        }
    </script>
@endsection
