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
                <div class="card">
                    <div class="card-header ml-2">
                        <h3>{{$exo->titre}}</h3>
                    </div>
                    <div class="card-body ml-5">
                        <form method="POST" action="{{route('enseignant.question.exercice.store')}}">
                            @csrf
                            @foreach($questions as $question)
                                <input type="hidden" name="exercice_id" value="{{$exo->id}}">
                                <div class="row ml-3">
                                    <div class="col-2">
                                        <div class="d-flex align-items-center page-num-container mb-16pt">
                                            <div class="page-num">2</div>
                                            <label class="form-label">Question
                                                <span class="text-danger">*</span> 
                                            </label>
                                            <input type="checkbox" class="form-check" name="question_cours_id[]" value="{{$question->id}}">
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex justify-content-around">
                                            <div class="p-2 bd-highlight">
                                                <label class="form-label">Point
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" name="point[]">
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <label class="form-label">Durée
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" name="duree[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-4 mb-5">
                                    {!! $question->contenu !!}
                                </div>
                            @endforeach
                            <div class="row mt-5 mb-3 mr-5 fa-pull-right">
                                <button type="submit" class="btn btn-outline-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
