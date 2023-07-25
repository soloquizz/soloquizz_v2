@extends('layouts.template.administration.master')

@section('css')
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/quill.rtl.css')}}" rel="stylesheet">
@endsection

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.administration.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.administration.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <!-- Section Dashboard Layout -->
        @include('template.administration.dashboard')
        <!-- END Section Dashboard Layout -->
        <div class="row justify-content-center mt-5">
            @include('adminlte-templates::common.errors')
        </div>
        <div class="container card bg-white page__container page-section mt-5">
            <div class="card-header">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h4 class="content-header-title">
                            Nombre de questions total
                            <div class="badge badge-glow badge-pill badge-info">{{$certification->questions->count()}}</div>
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="content-header-title">
                            Nombre maximal de questions par dump
                            <a href="#" class="text-70" data-toggle="modal" data-target="#addNbQa">
                                <div class="badge badge-glow badge-pill badge-info">{{$certification->nbre_qa}}</div>
                            </a>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <!-- Title -->
                    <div class="col-sm-4">
                        <h4 class="content-header-title">{{mb_strimwidth($certification->titre, 0, 30, "...")}}</h4>
                    </div>

                    <!-- Search -->
                    <form class="col-sm-4" method="POST" action="{{ route('admin.certifications.questions.search') }}">
                        @csrf
                        <div class="search-form search-form--light mb-3">
                            <input type="text" name="search" class="form-control" value="{{$textSearch}}"
                                   placeholder="Rechercher une question">
                            <input type="hidden" name="certification_id" value="{{$certification->id}}">
                            <button class="btn" type="submit" role="button"><i class="material-icons">search</i>
                            </button>
                        </div>
                    </form>

                    <!-- Bouton -->
                    <div class="col-sm-4 text-right">
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addQuestion">Nouvelle
                            question</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul style="list-style-type: none;">
                    @foreach($questions as $question)
                        <li class="mb-5">
                            <div class="row">
                                <div class="col-2"><h6>Question {{ $rank++ }}</h6></div>
                                <div class="col-2">{{$question->duree}} min</div>
                                <div class="col-2">{{$question->point}} point(s)</div>
                                <div class="col-2">
                                    @if(isset($_GET['page']))
                                        <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>$_GET['page']])}}">
                                            <i class="fa fa-edit text-warning mr-1"
                                               title="Mofification de la question"></i>
                                        </a>
                                    @else
                                        <a href="{{route('admin.questions.edit.custom', ['question_id'=>$question->id,'page'=>1])}}">
                                            <i class="fa fa-edit text-warning mr-1"
                                               title="Mofification de la question"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            {!! $question->contenu !!}
                            <h6>
                                Options de réponse &nbsp;
                                <a href="#" data-toggle="modal" data-target="#addOption">
                                    <i class="fa fa-plus-circle text-primary mr-1"
                                       onclick="changeIdquestion({{$question->id}})"
                                       title="Ajouter une option de réponse"></i>
                                </a>
                            </h6>
                            @foreach($question->options as $option)
                                <div class="row">
                                    @if($option->correcte)
                                        <i class="fa fa-check text-success mr-1"
                                           title="Mofification de la question"></i>
                                    @else
                                        <i class="fa fa-times text-danger mr-1" title="Mofification de la question"></i>
                                    @endif
                                    {!! $option->contenu !!}
                                    @if(isset($_GET['page']))
                                        <a href="{{route('admin.options.edit.custom', ['otion_id'=>$option->id,'page'=>$_GET['page']])}}">
                                            <i class="fa fa-edit text-warning mr-1"
                                               title="Mofification de l'option"></i>
                                        </a>
                                    @else
                                        <a href="{{route('admin.options.edit.custom', ['otion_id'=>$option->id,'page'=>1])}}">
                                            <i class="fa fa-edit text-warning mr-1"
                                               title="Mofification de l'option"></i>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
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

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('modal')
    @include('template.administration.questions.create')
    @include('template.administration.options.create')
    @include('template.administration.certifications.nb_qa_create')
@endsection

@section('script')
    <!-- Quill -->
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/image-resize.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script>
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

    </script>

@endsection


