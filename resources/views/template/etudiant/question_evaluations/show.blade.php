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

        <div class="row mt-3 justify-content-center">
            @include('adminlte-templates::common.errors')

        </div>

        <div class="container page__container">
            <div class="page-section">
                <div class="page-heading">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('enseignant.cours.show',$evaluation->cours_id)}}"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true">&nbsp;Retour</i></button></a>
                            </li>
                        </ol>
                    </nav>
                    <span class="mr-16pt">
                        <img src="{{$evaluation->cours->image()}}" width="40" alt="{{$evaluation->cours->nom}}" class="rounded">
                    </span>
                    <h4>{{$evaluation->cours->nom}}</h4>
                </div>

                <div class="card">
                    <div class="card-header ml-2">
                        <div class="row">
                            <div class="col-9"><h3>{{$evaluation->titre}}</h3></div>
                            <div class="col-3">
                                <a href="{{route('etudiant.cours.show.examen.question.treatement',$evaluation->id)}}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true">Traiter</i></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <ul style="list-style-type: none;">
                        @if($evaluation->evaluationExercices->count()==0)
                        <h3>Pas de questions</h3>
                        @else
                            @foreach($evaluation->evaluationExercices as $exo)
                           
                                <li class="mb-5">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>{{$exo->exercice?->titre}}</h3>
                                        </div>
                                        <div class="col-2">{{$exo->exercice?->note_max}}point(s)</div>
                                        
                                        <div class="col-2">
                                           {{-- @if(isset($_GET['page']))
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                                                    <i class="fa fa-trash text-danger mr-1" title="Suppression de la question"></i>
                                                </a>
                                            @else
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                                    <i class="fa fa-trash text-danger mr-1" title="Suppression de la question"></i>
                                                </a>
                                            @endif
                                            --}}
                                        </div>
                                    </div>
                                    @foreach($questionExercice as $question)
                                    @if($exo->exercice_id==$question->exercice_id)
                                   

                                    <div class="row">
                                    
                                        {!! $question->questionCours?->contenu !!}
                                       
                                    </div>
                                    @if($question->questionCours?->qcm)
                                        
                                            <h6>Options de réponse &nbsp;</h6> 
                                    <ol type="a">   
                                        @foreach($options as $option)
                                        
                                        @if($option->question_cours_id==$question->questionCours?->id && $exo->exercice_id==$question->exercice_id)
                                             <div class="row">
                                               
                                                <li>
                                                    {!! $option->contenu !!}
                                                </li>
                                            </div>
                                        @endif
                                        @endforeach
                                    </ol>
                                        @else
                                        <h6>Question à réponse ouverte</h6>
                                    @endif
                                    @endif
                                    @endforeach
                                </li>
                           
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                       {{--{{$evaluationExercice->links()}}--}} 
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
@endsection   