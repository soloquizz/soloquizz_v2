@extends('layouts.template.enseignant.master')

@section('css')
<!--Datatables-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

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
                            <a href="{{route('enseignant.cours.show',$evaluation->cours_id)}}"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true">&nbsp;Retour</i></button></a>
                        </li>
                    </ol>
                </nav>
                <div class="page-heading">
                    <span class="mr-16pt">
                        <img src="{{$evaluation->cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <h4>{{$evaluation->cours->nom}}</h4>
                </div>
                <div class="card">
                <form action="{{route('enseignant.evaluation.exercice.store')}}" method="POST">
                    @csrf   
                    <div class="card-header">
                        <button type="submit" class="btn btn-outline-primary">Ajouter</button>
                    </div>
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Selection</th>
                                <th>Titre</th>
                                <th>Séance</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exercices as $exo)
                            <tr>
                                <input type="hidden" name="evaluation_id" value="{{$evaluation->id}}">
                                <input type="hidden" id="allexercices" name="exercice_ids[]" value="">
                                <td><input type="checkbox" class="form-check ml-1" name="exercice_ids[]" value="{{$exo->id}}"></td>
                                <td>{{$exo->titre}}</td>
                                <td>{{$exo->seance?->titre}}</td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection  

@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

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

                document.getElementById('allexercices').value = question_ids;
                
                this.submit();
            });
        });
        $(document).ready(function(){
        $('#myTable').DataTable();
       
      })  
    </script>
@endsection