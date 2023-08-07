@extends('layouts.template.enseignant.master')

@section('css')
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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('enseignant.cours.show.td.question',$exo->id)}}"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true">&nbsp;Retour</i></button></a>
                        </li>
                    </ol>
                </nav>
                <div class="page-heading">
                    <span class="mr-16pt">
                        <img src="{{$exo->cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <h4>{{$exo->cours->nom}}</h4>
                    <input type="hidden" value="{{$exo->point}}" id="exoPt">
                </div>
                <div class="card">
                    <div class="card-header ml-2">
                        <h3>{{$exo->titre}}</h3>
                    </div>
                    <div class="card-body ml-5">
                        <form method="POST" action="{{route('enseignant.question.exercice.store')}}">
                            @csrf
                            <input type="hidden" name="exercice_id" value="{{$exo->id}}">
                            <input type="hidden" id="allquestions" name="questions_id[]" value="">
                            @foreach($questions as $question)
                            @if($question->qcm)
                            @if($question->optionCours->count()>0)
                                <div class="row ml-3">
                                    <div class="col-2">
                                        <div class="d-flex align-items-center page-num-container mb-16pt">
                                            <div class="page-num">{{$rank++}}</div>
                                            <input type="checkbox" class="form-check ml-1" name="question_ids[]" value="{{$question->id}}">
                                            <label class="form-label ml-3">Question
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex justify-content-around">
                                            <div class="p-2 bd-highlight">
                                                <label class="form-label">Point
                                                </label>
                                                <input type="number" name="points[]">
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <label class="form-label">Durée
                                                </label>
                                                <input type="number" name="durees[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-4 mb-5">
                                    {!! $question->contenu !!}
                                </div>
                                <h6>Option de réponses</h6>
                                @foreach($question->optionCours as $option)
                                <div class="row">
                                    
                                    @if($option->correcte)
                                        <i class="fa fa-check text-success mr-1" title="Mofification de la question"></i>
                                    @else
                                        <i class="fa fa-times text-danger mr-1" title="Mofification de la question"></i>
                                    @endif
                                    {!! $option->contenu !!}
                                    
                                </div>
                                @endforeach
                                @endif
                                @else
                                <div class="row ml-3">
                                    <div class="col-2">
                                        <div class="d-flex align-items-center page-num-container mb-16pt">
                                            <div class="page-num">{{$rank++}}</div>
                                            <input type="checkbox" class="form-check ml-1" name="question_ids[]" value="{{$question->id}}">
                                            <label class="form-label ml-3">Question
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex justify-content-around">
                                            <div class="p-2 bd-highlight">
                                                <label class="form-label">Point
                                                </label>
                                                <input type="number" name="points[]" id="point">
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <label class="form-label">Durée
                                                </label>
                                                <input type="number" name="durees[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-4 mb-5">
                                    {!! $question->contenu !!}

                                    <h6>Question à reponse ouverte</h6>
                                </div>
                                @endif
                           
                            @endforeach
                            
                            <div class="row mt-5 mb-3 mr-5 fa-pull-right">
                                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                            </div>
                            
                        </form>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                        {{$questions->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Attacher l'événement submit sur l'élément du formulaire
            $('form').submit(function(event) {
                // Empêcher la soumission du formulaire immédiatement
                event.preventDefault();

                var question_ids = [];

                // Get all checkbox inputs
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                // Get the number of checkboxes
                const numberOfCheckboxes = checkboxes.length;

                for (var i=0; i<numberOfCheckboxes; i++)  {
                    let valeur ;
                    if(checkboxes[i].checked){
                        valeur = checkboxes[i].value;
                    }
                    else{
                        valeur = 0;
                    }

                    question_ids[i] = valeur;
                }

                document.getElementById('allquestions').value = question_ids;
                
                this.submit();
            });
        });

        /*$("#enregistrer").on('click',function(){
            var exoPt=$("#exoPt").val();
            var totalPt=0
            var point=$("#point").val();
            if(point !== null){
              totalPt +=parseInt(point);
            }

            if(exoPt != totalPt){
                alert('le nombre total de point doit-etre égal');
            }
        })*/
    </script>
@endsection
