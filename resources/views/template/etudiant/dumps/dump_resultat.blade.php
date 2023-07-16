@extends('layouts.template.etudiant.master')


@section('content_page')
    <div class="mdk-header-layout__content page-content">
        <div class="navbar navbar-list navbar-submenu navbar-light border-0 navbar-expand-sm" style="white-space: nowrap;">
            <div class="container page__container">
                <nav class="nav navbar-nav">
                    <div class="nav-item navbar-list__item">
                        <a href="{{route('etudiant.dumps',$certification->id)}}" class="nav-link"><i class="material-icons icon--left">keyboard_backspace</i>Retour aux entrainements</a>
                    </div>
                    <div class="nav-item navbar-list__item">
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="mr-16pt">
                                <a href="{{route('etudiant.dumps',$certification->id)}}"><img src="{{$certification->editeur->image()}}" width="40" alt="Angular" class="rounded"></a>
                            </div>
                            <div class="flex">
                                <a href="{{route('etudiant.dumps',$certification->id)}}" class="card-title text-body mb-0">{{$certification->titre}}</a>
                                <p class="lh-1 d-flex align-items-center mb-0">
                                    <span class="text-50 small font-weight-bold mr-8pt">{{auth()->user()->getFullName()}}</span>
                                    <span class="text-50 small">{{auth()->user()->etudiant()->classe()->nom}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
            <div class="mdk-box__content">
                <div class="py-64pt text-center text-sm-left">
                    <div class="container d-flex flex-column justify-content-center align-items-center">
                        <p class="lead text-white-50 measure-lead-max mb-0">Fait le {{date('d-m-Y à H:i:s', strtotime($dump_user->created_at)) }}</p>
                        <h1 class="text-white mb-24pt">Votre Score: {{$dump_user->score}}/{{$dump->score}}</h1>
                        @if($dumpUsers->sum('score') < $certification->questions->sum('point'))
                            <a href="{{route('etudiant.dumps.take',$certification->id)}}" class="btn btn-outline-white">Nouveau entrainement</a>
                        @else
                            <p class="lead text-white-50 measure-lead-max mb-0">Vous avez achevé les entrainements de cette certification</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--div class="navbar navbar-expand-sm navbar-light navbar-submenu navbar-list p-0 m-0 align-items-center">
            <div class="container page__container">
                <ul class="nav navbar-nav flex align-items-sm-center">
                    <li class="nav-item navbar-list__item">350/450 Score</li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">schedule</i>
                        12 minutes
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">assessment</i>
                        Intermediate
                    </li>
                </ul>
            </div>
        </div-->
        <div class="container page__container">
            <div class="border-left-2 page-section pl-32pt">
                @foreach($dump_user->dumpuserQuestions as $dumpuserQuestion)
                    <div class="d-flex align-items-center page-num-container mb-16pt">
                        <div class="page-num {{$dumpuserQuestion->trouve ? 'bg-success' : 'bg-danger'}} ">{{$loop->iteration}}</div>
                        <h4>Question {{$loop->iteration}} sur {{$loop->count}}</h4>
                    </div>
                    <p class="text-70 mb-32pt mb-lg-48pt">{!! $dumpuserQuestion->question->contenu !!}</p>
                    <ul class="list-quiz mb-32pt mb-lg-64pt">
                        @foreach($dumpuserQuestion->question->options as $option)
                            @php
                                $choiceOptions = $dumpuserQuestion->etudiantQuestions->pluck('option_id');
                            @endphp
                            @if(in_array($option->id,$choiceOptions->toArray()))
                                <li class="list-quiz-item">
                                    <div class="row">
                                        <div class="col-1">
                                            <span class="list-quiz-badge {{$option->correcte ? 'list-quiz-badge-success' : 'list-quiz-badge-error'}}"><i class="fa {{$option->correcte ? 'fa-check' : 'fa-times'}}"></i></span>
                                        </div>
                                        <div class="col-11">
                                            <span class="list-quiz-text">{!! $option->contenu !!}</span>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="list-quiz-item">
                                    <div class="row">
                                        <div class="col-1">
                                            <span class="list-quiz-badge">A</span>
                                        </div>
                                        <div class="col-11">
                                            <span class="list-quiz-text">{!! $option->contenu !!}</span>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
