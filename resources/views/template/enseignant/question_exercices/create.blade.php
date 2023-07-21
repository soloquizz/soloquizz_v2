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
                <div class="page-heading">
                    <span class="mr-16pt">
                        <img src="{{$exo->cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <input type="hidden" value="{{$exo->cours->id}}" id="cours_id">
                    <h4>{{$exo->cours->nom}}</h4>

                </div>
                
                <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                    <div class="card-body">
                        <form method="POST" action="{{route('enseignant.question.exercice.store')}}">
                            @csrf
                            <h3>{{$exo->titre}}</h3>
                               @foreach($questions as $question)
                               <input type="hidden" name="exercice_id[]" value="{{$exo->id}}">
                               <div class="d-flex justify-content-around">
                                   <div class="p-2 bd-highlight"> 
                                       <label class="form-label">Question
                                           <span class="text-danger">*</span>
                                      </label>
                                      <input type="checkbox" name="question_cours_id[]" value="{{$question->id}}">  
                                   </div>
                                   <div class="p-2 bd-highlight">
                                       <label class="form-label">Point
                                           <span class="text-danger">*</span>
                                       </label>
                                       <input type="text" class="form-control form-control-sm" aria-label=".form-select-sm example" name="point[]">
                                   </div>
                                   <div class="p-2 bd-highlight">
                                       <label class="form-label">Durée
                                           <span class="text-danger">*</span>
                                       </label>
                                       <input type="text" class="form-control form-control-sm" aria-label=".form-select-sm example" name="duree[]">
                                   </div>
                               </div>
                               {!! $question->contenu !!}
                               @endforeach
                               <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    