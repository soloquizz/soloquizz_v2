@extends('layouts.template.enseignant.master')

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
                    <input type="hidden" value="{{$cours->id}}" id="cours_id">
                    <h4>{{$cours->nom}}</h4>

                </div>
                <div class="container card bg-white page__container page-section">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link {{isset($_GET['page']) ? '' : 'active'}}" href="#seances" onclick="switchTabSeance()" data-toggle="tab">Séances</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ressources" onclick="switchTabRessources()" data-toggle="tab">Ressources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{isset($_GET['page']) ? 'active' : ''}}" href="#questions" onclick="switchTabQuestions()" data-toggle="tab">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#td" onclick="switchTabExercices()"
                               data-toggle="tab">Exercices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#evaluations" onclick="switchTabEvaluations()" data-toggle="tab">Évaluations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#etudiants" onclick="switchTabEtudiants()" data-toggle="tab">Étudiants</a>
                        </li>
                        <div class="fa-pull-right mb-3">
                            <a href="#" class="btnTab btn btn-outline-primary ml-5" id="btnSeance"
                               data-toggle="modal" data-target="#addSeance">Nouvelle séance</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3 ml-3" id="btnRessource"
                               data-toggle="modal" data-target="#addRessource">Nouvelle ressource</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3 ml-5" id="btnQuestion"
                               data-toggle="modal" data-target="#addQuestionCours">Nouvelle question</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3 ml-5" id="btnExercice"
                               data-toggle="modal" data-target="#addExercice">Nouvel exercice</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3 ml-5" id="btnEvaluation"
                               data-toggle="modal" data-target="#addEvaluation">Nouvelle évaluation</a>
                        </div>
                    </ul>
                    <div class="card-body tab-content">
                        <!--ESPACE SEANCES-->
                        <div class="tab-pane {{isset($_GET['page']) ? '' : 'active'}}" id="seances">
                            <div class="row">
                                @foreach($cours->seances as $seance)
                                    <div class="col-sm-6">
                                        <div class="card card-path js-overlay stack stack--1 " data-toggle="popover"
                                             data-trigger="click">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                                <div class="overlay">
                                                                    <span class="overlay__content overlay__content-transparent">
                                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                        <small class="h6 small text-white mb-0"
                                                                               style="font-weight: 500;">80%</small>
                                                                    </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="flex">
                                                                <div class="card-title text-body mb-0">{{$seance->titre}}</div>
                                                                <div class="text-muted d-flex lh-1">
                                                                    {{date('d-m-Y', strtotime($seance->date)) }}
                                                                    entre {{$seance->heure_debut}}
                                                                    - {{$seance->heure_fin}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="ml-4pt btn btn-link text-secondary">Voir plus</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6>Exercices</h6>
                                                    <ul class="list-unstyled collapse show" id="toc-content-1">
                                                        <!--li class="accordion__menu-link">
                                                            <span class="material-icons icon-16pt icon--left text-body">check_circle</span>
                                                            <a class="flex" href="#">Introduction</a>
                                                            <span class="text-muted">8m 42s</span>
                                                        </li-->
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class="h6">Lien cours en ligne</span>
                                                    <a class="text-primary" target="_blank"
                                                       href="{{$seance->lien}}">{{$seance->lien}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--ESPACE RESSOURCES-->
                        <div class="tab-pane " id="ressources">
                            <div class="row">
                                @foreach($cours->supports as $support)
                                    @foreach($support->getMedia('supports') as $media)
                                        @if(Str::endsWith($media->getFullUrl(), '.pdf'))
                                            <div class="col-3">
                                                <div class="card text-center">
                                                    <a href="{{$media->getFullUrl()}}">
                                                        <img height="100"
                                                             src="{{asset('assets/images/icon/icone_pdf.png')}}">
                                                    </a>
                                                    <div class="card-footer">
                                                        <a title="{{$support->file_name}}" target="_blank"
                                                           href="{{$media->getFullUrl()}}">{{mb_strimwidth($support->file_name, 0, 15, "...")}}
                                                            <i class="icon--right material-icons">file_download</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif(Str::endsWith($media->getFullUrl(), '.docx'))
                                            <div class="col-3">
                                                <div class="card text-center">
                                                    <a href="{{$media->getFullUrl()}}">
                                                        <img height="100"
                                                             src="{{asset('assets/images/icon/word_icone.png')}}">
                                                    </a>
                                                    <div class="card-footer">
                                                        <a title="{{$support->file_name}}" target="_blank"
                                                           href="{{$media->getFullUrl()}}">{{mb_strimwidth($support->file_name, 0, 15, "...")}}
                                                            <i class="icon--right material-icons">file_download</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-3">
                                                <div class="card text-center">
                                                    <a href="{{$media->getFullUrl()}}">
                                                        <img height="100"
                                                             src="{{asset('assets/images/icon/video_icone.png')}}">
                                                    </a>
                                                    <div class="card-footer">
                                                        <a title="{{$support->file_name}}" target="_blank"
                                                           href="{{$media->getFullUrl()}}">{{mb_strimwidth($support->file_name, 0, 15, "...")}}
                                                            <i class="icon--right material-icons">file_download</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <!--ESPACE QUESTION-->
                        <div class="tab-pane {{isset($_GET['page']) ? 'active' : ''}}" id="questions">
                            <div class="card-body">
                                <ul style="list-style-type: none;">
                                    @foreach($questions as $question)
                                        <li class="mb-5">
                                            <div class="row">
                                                <div class="col-2"><h6>Question {{ $rank++ }}</h6></div>
                                                <div class="col-2">
                                                    @if(isset($_GET['page']))
                                                        <a href="{{route('enseignant.questionCours.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                                                            <i class="fa fa-edit text-warning mr-1"
                                                               title="Mofification de la question"></i>
                                                        </a>
                                                        <input type="hidden" name="page" value="true" id="page">
                                                    @else
                                                        <a href="{{route('enseignant.questionCours.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                                            <i class="fa fa-edit text-warning mr-1"
                                                               title="Mofification de la question"></i>
                                                        </a>
                                                        <input type="hidden" name="page" value="false" id="page">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                {!! $question->contenu !!}
                                            </div>
                                            @if($question->qcm)
                                             <h6>
                                                Options de réponse &nbsp;
                                                <a href="#" data-toggle="modal" data-target="#addOption">
                                                    <i class="fa fa-plus-circle text-primary mr-1" onclick="changeIdquestion({{$question->id}})" title="Ajouter une option de réponse"></i>
                                                </a>
                                            </h6>
                                            @foreach($question->optionCours as $option)
                                                <div class="row">
                                                    @if($option->correcte)
                                                        <i class="fa fa-check text-success mr-1" title="Mofification de la question"></i>
                                                    @else
                                                        <i class="fa fa-times text-danger mr-1" title="Mofification de la question"></i>
                                                    @endif
                                                    {!! $option->contenu !!}
                                                    @if(isset($_GET['page']))
                                                        <a href="{{route('enseignant.options.cours.edit.custom', ['option_id'=>$option->id,'page'=>$_GET['page']])}}">
                                                            <i class="fa fa-edit text-warning mr-1" title="Mofification de l'option"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{route('enseignant.options.cours.edit.custom', ['option_id'=>$option->id,'page'=>1])}}">
                                                            <i class="fa fa-edit text-warning mr-1" title="Mofification de l'option"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endforeach
                                            @else
                                            <h6>Question à réponse ouverte</h6>
                                        @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                <nav aria-label="Page navigation example">
                                    {{$questions->links()}}
                                </nav>
                            </div>

                        </div>
                        <!--ESPACE EXERCICE-->
                        <div class="tab-pane" id="td">
                            <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                                <!-- Table -->
                                <table id="myTable1" class="table">
                                    <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Nombre de questions</th>
                                        <th>Points</th>
                                        <th>Durée</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($cours->exercices as $exo)
                                    
                                        <tr>
                                            <td class="name"><input type="hidden" name="titre" value="{{$exo->titre}}">{{$exo->titre}}</td>
                                            <td class="name"><input type="hidden" name="cours_id" value="{{$cours->id}}">{{$exo->questionExercices->count()}}</td>
                                            <td class="name"><input type="hidden" name="note_max" value="{{$exo->note_max}}">{{$exo->note_max}}</td>
                                            <td class="name"><input type="hidden" name="duree" value="{{$exo->duree}}">{{$exo->duree}}</td>
                                            <td class="name">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <form method="POST" id="showForm"
                                                              action="{{ route('admin.certifications.questions.search') }}">
                                                            @csrf
                                                            <input type="hidden" name="exo_id" value="{{$exo->id}}">
                                                            <a href="{{route('enseignant.cours.show.td.question',$exo->id)}}">
                                                                <i class="fa fa-eye text-info mr-1" title="Mofification"></i>
                                                            </a>
                                                        </form>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="{{route('enseignant.cours.show.td',$exo->id)}}">
                                                            <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-2">
                                                        @if ($exo->statut==1)
                                                        <button class="btn btn-danger mr-1">Déjà Publié</button>
                                                        @else
                                                        <form method="POST" action="{{route('enseignant.exercice.update.statut',$exo->id)}}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-dark mr-1">Publier</button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                    @endforeach
                                
                                    </tbody>
                                </table>
                            </div>
                            {{--<div class="row">
                                @foreach($cours->exercices as $exo)
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
                                                                <div class="card-title text-body mb-0">{{$exo->titre}}</div>
                                                                <div class="text-muted d-flex lh-1">
                                                                    {{$exo->questionExercices->count()}} questions pour {{$exo->duree}} min - {{$exo->note_max}} point(s)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="ml-4pt btn btn-link text-secondary">Voir plus</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="row">
                                                <div class="col-12">
                                                    <a class="text-primary"
                                                       href="{{route('enseignant.cours.show.td',$exo->id)}}">
                                                        Ajouter des questions
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <a class="text-primary"
                                                       href="{{route('enseignant.cours.show.td.question',$exo->id)}}">
                                                        <span class="h6">Consulter</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>--}}
                        </div>
                        <!--ESPACE ÉVALUATIONS-->
                        <div class="tab-pane" id="evaluations">
                            <ul class="nav nav-tabs nav-tabs-card">
                                <li class="nav-item">
                                    <a class="nav-link {{isset($_GET['page']) ? '' : 'active'}}" href="#devoirs" onclick="switchTabDevoirs()" data-toggle="tab">Devoir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#examens" onclick="switchTabExamens()" data-toggle="tab">Examens</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="devoirs">
                                    <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                                        <!-- Table -->
                                        <table id="myTable2" class="table">
                                            <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Nombre de questions</th>
                                                <th>Points</th>
                                                <th>Durée</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach($cours->evaluations as $evaluation)
                                                @if($evaluation->type=='Devoir')
                                            
                                                <tr>
                                                    <td class="name">{{$evaluation->titre}}</td>
                                                    <td class="name">{{$exo->questionExercices->count()}}</td>
                                                    <td class="name">{{$evaluation->note_max}}</td>
                                                    <td class="name">{{$evaluation->duree}}</td>
                                                    <td class="name">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <form method="POST" id="showForm"
                                                                      action="{{ route('admin.certifications.questions.search') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="exo_id" value="{{$exo->id}}">
                                                                    <a href="{{route('enseignant.cours.show.evaluation.view.question',$evaluation->id)}}">
                                                                        <i class="fa fa-eye text-info mr-1" title="Mofification"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                            <div class="col-2">
                                                                <a href="{{route('enseignant.cours.show.td',$exo->id)}}">
                                                                    <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-2">
                                                                @if ($exo->statut==1)
                                                                <button class="btn btn-danger mr-1">Déjà Publié</button>
                                                                @else
                                                                <form method="POST" action="{{route('enseignant.exercice.update.statut',$exo->id)}}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-dark mr-1">Publier</button>
                                                                </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                            @endif
                                            @endforeach
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                    {{--<div class="row">
                                        @foreach($cours->evaluations as $evaluation)
                                        @if($evaluation->type=='Devoir')
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
                                                                        <div class="card-title text-body mb-0">{{$evaluation->titre}}</div>
                                                                        <div class="text-muted d-flex lh-1">
                                                                            {{--{{$exo->questionExercices->count()}} questions pour {{$evaluation->duree}} min - {{$evaluation->note_max}} point(s)
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="ml-4pt btn btn-link text-secondary">Voir plus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="popoverContainer d-none">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="text-primary"
                                                               href="{{route('enseignant.cours.show.evaluation.add.question',$evaluation->id)}}">
                                                                Ajouter des questions
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="text-primary"
                                                               href="{{route('enseignant.cours.show.evaluation.view.question',$evaluation->id)}}">
                                                                <span class="h6">Consulter</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>--}}
                                </div>
                                <div class="tab-pane" id="examens">
                                    <table id="myTable3" class="table">
                                        <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Nombre de questions</th>
                                            <th>Points</th>
                                            <th>Durée</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                     @foreach($cours->evaluations as $evaluation)
                                     @if($evaluation->type=='Examen')
                                     <tr>
                                        <td class="name">{{$evaluation->titre}}</td>
                                        <td class="name">{{$exo->questionExercices->count()}}</td>
                                        <td class="name">{{$evaluation->note_max}}</td>
                                        <td class="name">{{$evaluation->duree}}</td>
                                        <td class="name">
                                            <div class="row">
                                                <div class="col-2">
                                                    <form method="POST" id="showForm"
                                                          action="{{ route('admin.certifications.questions.search') }}">
                                                        @csrf
                                                        <input type="hidden" name="exo_id" value="{{$exo->id}}">
                                                        <a href="{{route('enseignant.cours.show.evaluation.view.question',$evaluation->id)}}">
                                                            <i class="fa fa-eye text-info mr-1" title="Mofification"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                                <div class="col-2">
                                                    <a href="{{route('enseignant.cours.show.td',$exo->id)}}">
                                                        <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                    </a>
                                                </div>
                                                <div class="col-2">
                                                    @if ($exo->statut==1)
                                                    <button class="btn btn-danger mr-1">Déjà Publié</button>
                                                    @else
                                                    <form method="POST" action="{{route('enseignant.exercice.update.statut',$exo->id)}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-dark mr-1">Publier</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    </table>
                                    {{--<div class="row">
                                        @foreach($cours->evaluations as $evaluation)
                                        @if($evaluation->type=='Examen')
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
                                                                        <div class="card-title text-body mb-0">{{$evaluation->titre}}</div>
                                                                        <div class="text-muted d-flex lh-1">
                                                                            {{$exo->questionExercices->count()}}questions pour {{$evaluation->duree}} min - {{$evaluation->note_max}} point(s)
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="ml-4pt btn btn-link text-secondary">Voir plus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="popoverContainer d-none">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="text-primary"
                                                               href="{{route('enseignant.cours.show.evaluation.add.question',$evaluation->id)}}">
                                                                Ajouter des questions
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="text-primary"
                                                               href="{{route('enseignant.cours.show.evaluation.view.question',$evaluation->id)}}">
                                                                <span class="h6">Consulter</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <!--ESPACE ETUDIANTS-->
                        <div class="tab-pane" id="etudiants">
                            <table id="myTable4">
                                <thead>
                                    <tr>
                                        <th>Numéro carte</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Téléphone</th>
                                        <th>E-mail Institutionnel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inscrits as $etudiant)
                                    <tr>
                                        <td>{{$etudiant->etudiant->numero_carte}}</td>
                                        <td>{{$etudiant->etudiant->nom}}</td>
                                        <td>{{$etudiant->etudiant->prenom}}</td>
                                        <td>{{$etudiant->etudiant->telephone}}</td>
                                        <td>{{$etudiant->etudiant->email_personnel}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          
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
    @include('template.enseignant.questionCours.create')
    @include('template.enseignant.exercices.create')
    @include('template.enseignant.options_cours.create')
    @include('template.enseignant.evaluations.create')
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
            var testPage = $('#page').val();
            if(testPage === "true"){
                switchTabQuestions();
            }
            else {
                switchTabSeance();
            }

        });

        function switchTabSeance() {
            $('.btnTab').hide();
            $('#btnSeance').show();
        }

        function switchTabRessources() {
            $('.btnTab').hide();
            $('#btnRessource').show();
        }

        function switchTabQuestions() {
            $('.btnTab').hide();
            $('#btnQuestion').show();
        }

        function switchTabExercices() {
            $('.btnTab').hide();
            $('#btnExercice').show();
        }

        function switchTabEvaluations() {
            $('.btnTab').hide();
            $('#btnEvaluation').show();
            $('#devoirs').show();
        }
        function switchTabExamens() {
            $('.btnTab').hide();
            $('#devoirs').hide();
            $('#btnEvaluation').show();

        }

        function switchTabDevoirs() {
            $('.btnTab').hide();
            $('#devoirs').show();
            $('#btnEvaluation').show();

        }

        function switchTabEtudiants() {
            $('.btnTab').hide();
        }

        //Quill 
        var quillQuestion = new Quill('#editorQuestion', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'color': []}, {'background': []}],
                    [{'align': []}],
                    ['link', 'image'],
                    [{"list": "ordered"}, {"list": "bullet"}],
                    ['clean']
                ]
            }
        });

        var quillOption = new Quill('#editorOption', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'color': []}, {'background': []}],
                    [{'align': []}],
                    ['link', 'image'],
                    [{"list": "ordered"}, {"list": "bullet"}],
                    ['clean']
                ]
            }
        });

        $("#storeQuestionForm").on("submit", function () {
            $("#hiddenAreaQuestion").val($("#editorQuestion").html());
        });

        $("#storeOptionForm").on("submit", function () {
            $("#hiddenAreaOption").val($("#editorOption").html());
        });

        function changeIdquestion(idQuestion) {
            $("#idQuestion").val(idQuestion);
        }
 
         $(document).ready(function(){
           $('#myTable1').DataTable();
           $('#myTable2').DataTable();
           $('#myTable3').DataTable();
           $('#myTable4').DataTable();
         })  
    </script>
@endsection

