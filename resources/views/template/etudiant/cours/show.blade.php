@extends('layouts.template.etudiant.master')

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.etudiant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.etudiant.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

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
                            <a class="nav-link active" href="#seances" data-toggle="tab">Séances</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ressources" data-toggle="tab">Ressources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#td" data-toggle="tab">Exercices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#evaluations" data-toggle="tab">Évaluations</a>
                        </li>
                    </ul>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="seances">
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
                                                        <a href="{{$media->getFullUrl()}}"
                                                           title="{{$support->file_name}}"
                                                           target="_blank">{{mb_strimwidth($support->file_name, 0, 15, "...")}}
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
                       <!--ESPACE DES TD--> 
                        <div class="tab-pane" id="td">
                            <div class="row">
                                @if($cours->exercices->count()==0)
                                <h6>Aucun exercice publié pour le moment</h6>
                                @else
                                
                                <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                                    <!-- Table -->
                                    <table id="myTable" class="table">
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
                                        @if($exo->statut==1)
                                            <tr>
                                                <td class="name">{{$exo->titre}}</td>
                                                <td class="name">{{$exo->questionExercices->count()}}</td>
                                                <td class="name">{{$exo->note_max}}</td>
                                                <td class="name">{{$exo->duree}}</td>
                                                <td class="name">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <form method="POST" id="showForm"
                                                                  action="{{ route('admin.certifications.questions.search') }}">
                                                                @csrf
                                                                <input type="hidden" name="certification_id" value="{{$exo->id}}">
                                                                <a href="{{route('etudiant.cours.show.td.question',$exo->id)}}">
                                                                    <i class="fa fa-eye text-info mr-1" title="Mofification"></i>
                                                                </a>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                        <div class="tab-pane" id="evaluations">
                            <div class="row">
                                @if($cours->exercices->count()==0)
                                <h6>Aucun exercice publié pour le moment</h6>
                                @else
                                
                                <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

                                    <!-- Table -->
                                    <table id="myTable" class="table">
                                        <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Points</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        @foreach($cours->evaluations as $evaluation)
                                        @if($evaluation->statut==1)
                                            <tr>
                                                <td class="name">{{$evaluation->titre}}</td>
                                                <td class="name">{{$evaluation->note_max}}</td>
                                                <td class="name">{{$evaluation->type}}</td>
                                                <td class="name">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <form method="POST" id="showForm"
                                                                  action="{{ route('admin.certifications.questions.search') }}">
                                                                @csrf
                                                                <input type="hidden" name="certification_id" value="{{$evaluation->id}}">
                                                                <a href="{{route('etudiant.cours.show.evaluation.view.question',$evaluation->id)}}">
                                                                    <i class="fa fa-eye text-info mr-1" title="Mofification"></i>
                                                                </a>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                               
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

