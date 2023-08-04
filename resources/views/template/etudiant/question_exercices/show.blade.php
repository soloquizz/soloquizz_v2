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
                                <a href="{{route('etudiant.cours.show',$exo->cours_id)}}"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true">&nbsp;Retour</i></button></a>
                            </li>
                        </ol>
                    </nav>
                    <span class="mr-16pt">
                        <img src="{{$exo->cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <input type="hidden" value="{{$exo->cours->id}}" id="cours_id">
                    <h4>{{$exo->cours->nom}}</h4>
                </div>
                <div class="card">
                    <div class="card-header ml-2">
                        <h3>{{$exo->titre}}</h3>
                    </div>
                    <div class="card-body">
                        <ul style="list-style-type: none;">
                            @foreach($questionExercice as $question)
                                <li class="mb-5">
                                    <div class="row">
                                        <div class="col-2">
                                            <h6>Question {{ $rank++ }}</h6>
                                        </div>
                                        <div class="col-2">{{$question->point}}point(s)</div>
                                        <div class="col-2">{{$question->durée}}min</div>
                                        
                                        <div class="col-2">
                                            @if(isset($_GET['page']))
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                                                    <i class="fa fa-trash text-danger mr-1" title="Suppression de la question"></i>
                                                </a>
                                            @else
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                                    <i class="fa fa-trash text-danger mr-1" title="Suppression de la question"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! $question->questionCours->contenu !!}

                                    </div>
                                    @if($question->questionCours->qcm)
                                        
                                            <h6>Options de réponse &nbsp;</h6> 
                                           
                                        @foreach($question->questionCours->optionCours as $option)
                                             <div class="row">
                                                @if($option->correcte)
                                                    <i class="fa fa-check text-success mr-1" title="Mofification de la question"></i>
                                                @else
                                                    <i class="fa fa-times text-danger mr-1" title="Mofification de la question"></i>
                                                @endif
                                                {!! $option->contenu !!}
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
                        {{$questionExercice->links()}}
                        </nav>
                    </div>
                </div>  
            </div>
        </div>
    </div> 
@endsection   