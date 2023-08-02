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
                                            <h6>Question {{ $rank++}}</h6>
                                            <span>{{$question->point}}pts</span>
                                            <span>{{$question->durée}}min</span>
                                        </div>
                                        <div class="col-2">
                                            {{--@if(isset($_GET['page']))
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                                                    <i class="fa fa-edit text-warning mr-1" title="Mofification de la question"></i>
                                                </a>
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                                                    <i class="fa fa-delete text-danger mr-1" title="Mofification de la question"></i>
                                                </a>
                                            @else
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                                    <i class="fa fa-edit text-warning mr-1" title="Mofification de la question"></i>
                                                </a>
                                                <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                                    <i class="fa fa- text-danger mr-1" title="Mofification de la question"></i>
                                                </a>
                                            @endif--}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! $question->questionCours->contenu !!}

                                    </div>
                                    <!-- <h6>
                                     Options de réponse &nbsp;
                                    <a href="#" data-toggle="modal" data-target="#addOption">
                                        <i class="fa fa-plus-circle text-primary mr-1" onclick="changeIdquestion({{$question->id}})" title="Ajouter une option de réponse"></i>
                                    </a>
                                    </h6>
                                    {{--@foreach($question->options as $option)
                                    <div class="row">
                                        @if($option->correcte)
                                            <i class="fa fa-check text-success mr-1" title="Mofification de la question"></i>
                                        @else
                                            <i class="fa fa-times text-danger mr-1" title="Mofification de la question"></i>
                                        @endif
                                        {!! $option->contenu !!}
                                        @if(isset($_GET['page']))
                                            <a href="{{route('admin.options.edit.custom', ['otion_id'=>$option->id,'page'=>$_GET['page']])}}">
                                                <i class="fa fa-edit text-warning mr-1" title="Mofification de l'option"></i>
                                            </a>
                                        @else
                                            <a href="{{route('admin.options.edit.custom', ['otion_id'=>$option->id,'page'=>1])}}">
                                                <i class="fa fa-edit text-warning mr-1" title="Mofification de l'option"></i>
                                            </a>
                                        @endif
                                    </div>
                                    @endforeach---}}
                                    -->
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