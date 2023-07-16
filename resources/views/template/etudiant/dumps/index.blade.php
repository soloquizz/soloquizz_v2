@extends('layouts.template.etudiant.master')

@section('title')
    Liste des dumps
@endsection

@section('content_page')
    <div class="mdk-header-layout__content page-content">
        <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
            <div class="mdk-box__content">
                <div class="py-64pt text-center text-sm-left">
                    <div class="container d-flex flex-column justify-content-center align-items-center">
                        <p class="lead text-white-50 measure-lead-max mb-0">Une fois un entrainement généré vous ne pouvez faire aucune autre activité</p>
                        <h1 class="text-white mb-24pt">{{$certification->titre}}</h1>
                        @if($dumpUsers->sum('score') < $certification->questions->sum('point'))
                            <a href="{{route('etudiant.dumps.take',$certification->id)}}" class="btn btn-outline-white">Nouveau entrainement</a>
                        @else
                            <p class="lead text-white-50 measure-lead-max mb-0">Vous avez achevé les entrainements de cette certification</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-sm navbar-light navbar-submenu navbar-list p-0 m-0 align-items-center">
            <div class="container page__container">
                @if($dumpUsers->count()>0)
                    <ul class="nav navbar-nav flex align-items-sm-center">
                        <li class="nav-item navbar-list__item">{{$dumpUsers->sum('score')}}/{{$certification->questions->sum('point')}} Score</li>

                        @if($certification->dumps->sum('score')>0)
                            @php
                                $percent = intval(($dumpUsers->sum('score')/$certification->questions->sum('point'))*100);
                            @endphp
                            @if($percent<25)
                                <li class="nav-item text-danger navbar-list__item">
                                    <i class="material-icons text-muted icon--left">assessment</i>
                                    {{ $percent}}% &nbsp;
                                    Débutant
                                </li>
                            @elseif($percent>24 && $percent<50)
                                <li class="nav-item text-warning navbar-list__item">
                                    <i class="material-icons text-muted icon--left">assessment</i>
                                    {{ $percent}}% &nbsp;
                                    Intermédiaire
                                </li>
                            @elseif($percent>49 && $percent<75)
                                <li class="nav-item text-info navbar-list__item">
                                    <i class="material-icons text-muted icon--left">assessment</i>
                                    {{ $percent}}% &nbsp;
                                    Avancé
                                </li>
                            @elseif($percent>74 && $percent<=100)
                                <li class="nav-item text-success navbar-list__item">
                                    <i class="material-icons text-muted icon--left">assessment</i>
                                    {{ $percent}}% &nbsp;
                                    Expert
                                </li>
                            @endif
                        @endif

                        <li class="nav-item navbar-list__item">
                            <i class="fa fa-question mr-2"></i>
                            {{$dumpUsers->sum('question_true') + $dumpUsers->sum('question_false')}} questions traitées
                        </li>
                        <li class="nav-item navbar-list__item">
                            <i class="fa fa-check text-success mr-2"></i>
                            {{$dumpUsers->sum('question_true')}} questions trouvées
                        </li>
                        <li class="nav-item navbar-list__item">
                            <i class="fa fa-times text-danger mr-2"></i>
                            {{$dumpUsers->sum('question_false')}} questions fauchées
                        </li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="container page__container">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('etudiant.index')}}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{route('etudiant.certifications')}}">Certifications</a></li>
                <li class="breadcrumb-item active"><a href="{{route('etudiant.dumps',$certification->id)}}">Liste des entraînements</a></li>
            </ol>
        </div>
        <div class="container page__container">
            <!-- Search -->
            @if($dumpUsers->count()>0)
                <div class="search-form search-form--light mb-3 col-sm-4">
                    <input type="text" class="form-control search" placeholder="Rechercher">
                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                </div>
            @endif
        </div>
        <div class="container page__container">
            @if($dumpUsers->count()>0)
                <div class="card stack">
                    <div class="list-group list-group-flush">
                        @foreach($dumpUsers as $dumpUser)
                            <div class="list-group-item d-flex align-items-center px-16pt">
                                <div class="flex d-flex flex-column">
                                    <a class="text-body" href="{{route('etudiant.dumps.resultat',$dumpUser->id)}}">{{$dumpUser->dump->titre}}</a>
                                    <small class="text-muted text-danger">{{date('d-m-Y à H:i:s', strtotime($dumpUser->created_at)) }}</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <span class="lead lh-1">{{$dumpUser->score}}/{{$dumpUser->dump->score}}</span>
                                    <small class="text-muted text-uppercase">Score</small>
                                </div>
                                <a href="#" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <!-- Pagination -->
                <ul class="pagination justify-content-center pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                            <span>Prev</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#" aria-label="1">
                            <span>1</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="1">
                            <span>2</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span>Next</span>
                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                        </a>
                    </li>
                </ul>
            @else
                <h4 class="text-cente mt-5">Vous n'avez pas encore d'entrainements</h4>
            @endif
        </div>
    </div>
@endsection
