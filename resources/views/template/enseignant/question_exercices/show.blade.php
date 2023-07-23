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
                            <h3>{{$exo->titre}}</h3>
                            @foreach($exo->questionExercices as $ex)
                            <div class="d-flex flex-row bd-highlight mb-3">
                                   <div class="p-2 bd-highlight"> 
                                       <label class="form-label" id="question">Question
                                      </label>
                                   </div>
                                   <div class="p-2 bd-highlight">
                                       <label class="form-label"> {{$ex->point}} Point
                                       </label>
                                      
                                   </div>
                                   <div class="p-2 bd-highlight">
                                       <label class="form-label"> {{$ex->duree}} min
                                       </label>
                                      
                                   </div>
                               </div>
                               {!! $ex->questionCours->contenu !!}
                               @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var i = 1;
$('#question').each(function()
                                {
                                  $(this).text(i++);
                                 });
</script>
@endsection
    