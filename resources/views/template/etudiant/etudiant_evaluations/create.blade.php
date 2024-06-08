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
                                <a href="{{route('etudiant.cours.show',$evaluation->cours_id)}}"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true">&nbsp;Retour</i></button></a>
                            </li>
                        </ol>
                    </nav>
                    <span class="mr-16pt">
                        <img src="{{$evaluation->cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <input type="hidden" value="{{$evaluation->cours->id}}" id="cours_id">
                    <h4>{{$evaluation->cours->nom}}</h4>
                </div>
                <div class="card">
                    <div class="card-header ml-2">
                        <div class="row">
                            <div class="col-8">
                                <h3>{{$evaluation->titre}}</h3>
                            </div>
                           

                        </div>
                        
                    </div>
                    <div class="card-body">
                        <ul style="list-style-type: none;">
                            <form method="POST" id="storeQuestionForm" action="{{route('etudiant.question.cours.store')}}">
                                @csrf
                                <!--<input type="hidden" id="allquestions" name="questions_id[]" value="">-->
                                @foreach($evaluation->evaluationExercices as $exo)
                                <li class="mb-5">
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="hidden" name="user_id[]" value="{{$user->id}}">
                                            <input type="hidden" name="etudiant_id[]" value="{{$user->etudiant()->id}}">
                                            {{--<input type="hidden" class="question form-check ml-1" name="question_cours_id[]" value="{{$question->question_cours_id}}">--}}

                                            <h6>{{$exo->exercice?->titre}}</h6>

                                        </div>
                                        <div class="col-2">{{$exo->exercice?->note_max}}point(s)</div>
                                        <div class="col-2">{{$exo->exercice?->durée}}min</div>
                                    </div>
                                    @foreach($questionExercice as $question)
                                    @if($exo->exercice_id==$question->exercice_id)
                                    <div class="row">
                                        {!! $question->questionCours?->contenu !!}
                                    </div>
                                    @if($question->questionCours->qcm)
                                            <h6>Options de réponse &nbsp;</h6> 
                                                <ol type="a">
                                                    @foreach($options as $option)
                                        
                                                    @if($option->question_cours_id==$question->questionCours?->id && $exo->exercice_id==$question->exercice_id)
                                                    <li class="d-flex">
                                                        <input type="hidden" name="option_id[]" value="">
                                                        <input type="checkbox" name="option_id[]" value="{{$option->id}}">{!! $option->contenu !!}
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ol>
                                    @else
                                        <div class="col-12 col-md-6 mb-3">
                                            <textarea name="contenu[]" style="display:none" id="hiddenAreaQuestion" class="textarea"></textarea>
                                        </div>
                                        <div class="form-row quill" >
                                            <div class="col-12 col-md-12 mb-3">
                                                <label class="form-label">Réponse
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div style="height: 500px; overflow-y:auto;margin-top:3em" class="editor">
            
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endif
                                    @endforeach
                                </li>
                            @endforeach
                            <div class="row mt-5 mb-3 mr-5 fa-pull-right">
                                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            </div> 
                            </form>
                        </ul>
                    </div>
                    {{--<div class="card-footer">
                        <nav aria-label="Page navigation example">
                        {{$questionExercice->links()}}
                        </nav>
                    </div>--}}
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

var i=0;
$('.editor').each(function(){
    i++;
    var newID='editorQuestion'+i;
    $(this).attr('id',newID);
    $(this).val(i);
    editeur=$(this).val(i);
    id=editeur.attr('id')
    console.log(id)

//Quill 
        var quillQuestion = new Quill('#'+id, {
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
    });
        /*
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
        */
        
</script>
@endsection