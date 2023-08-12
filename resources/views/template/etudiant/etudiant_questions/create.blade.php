@extends('layouts.template.enseignant.master')
@section('css')
     <!-- Quill Theme -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('assets/css/quill.rtl.css')}}" rel="stylesheet">
    @endsection

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
                        <div class="row">
                            <div class="col-8">
                                <h3>{{$exo->titre}}</h3>
                            </div>
                           

                        </div>
                        
                    </div>
                    <div class="card-body">
                        <ul style="list-style-type: none;">
                            <form method="POST" id="storeQuestionForm" action="{{route('etudiant.question.cours.store')}}">
                                @csrf
                                <input type="hidden" id="allquestions" name="questions_id[]" value="">
                            @foreach($questionExercice as $question)
                                <li class="mb-5">
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="hidden" name="questions_id[]" value="{{$question->id}}">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            <input type="hidden" name="etudiant_id" value="{{$user->etudiant()->etudiant_id}}">

                                            <h6>Question {{ $rank++ }}</h6>
                                        </div>
                                        <div class="col-2">{{$question->point}}point(s)</div>
                                        <div class="col-2">{{$question->durée}}min</div>
                                    </div>
                                    <div class="row">
                                        {!! $question->questionCours->contenu !!}
                                    </div>
                                    @if($question->questionCours->qcm)
                                            <h6>Options de réponse &nbsp;</h6> 
                                                <ol type="a">
                                                    @foreach($question->questionCours->optionCours as $option)
                                                    <li class="d-flex">
                                                        <input type="checkbox">{!! $option->contenu !!}
                                                    </li>
                                                    @endforeach
                                                </ol>
                                        @else
                                        <div class="col-12 col-md-6 mb-3">
                                            <textarea name="contenu[]" style="display:none" id="hiddenAreaQuestion"></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-12 mb-3">
                                                <label class="form-label">Contenu
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div id="editorQuestion" style="height: 500px; overflow-y:auto;margin-top:3em">
            
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                            <div class="row mt-5 mb-3 mr-5 fa-pull-right">
                                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            </div> 
                            </form>
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

@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/image-resize.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script>
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


        $("#storeQuestionForm").on("submit", function () {
            $("#hiddenAreaQuestion").val($("#editorQuestion").html());
        });
        $(document).ready(function() {
            // Attacher l'événement submit sur l'élément du formulaire
            $('form').submit(function(event) {
                // Empêcher la soumission du formulaire immédiatement
                event.preventDefault();

                var question_ids = [];

                // Get all checkbox inputs
                const checkboxes = document.querySelectorAll('input[name="questions_id[]"]');
                console.log(checkboxes)
                // Get the number of checkboxes
                const numberOfCheckboxes = checkboxes.length;

                for (var i=0; i<numberOfCheckboxes; i++)  {
                    
                    valeur = checkboxes[i].value;
                    console.log(valeur);
                  
                    question_ids[i] = valeur;
                }

                document.getElementById('allquestions').value = question_ids;
                
                this.submit();
            });
        });
        
</script>
@endsection