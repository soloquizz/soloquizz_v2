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
                        <img src="{{$exo->cours->image()}}" width="40" alt="{{$exo->cours->nom}}" class="rounded">
                    </span>
                    <h4>{{$exo->cours->nom}}</h4>
                </div>

                <div class="card">
                    <div class="card-header ml-2">
                        <h3>{{$exo->titre}}</h3>
                    </div>
                    <div class="card-body ml-5">
                        @foreach($exo->questionExercices as $key => $question)
                            <div class="row ml-3">
                                <div class="col-2">
                                    <div class="d-flex align-items-center page-num-container mb-16pt">
                                        <div class="page-num">{{$key+1}}</div>
                                        <label class="form-label ml-3">Question
                                        </label>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="d-flex justify-content-around">
                                        <div class="p-2 bd-highlight">
                                            <label class="form-label">{{$question->point}} points</label>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <label class="form-label">{{$question->duree}} min</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-4 mb-5">
                                {!! $question->questionCours->contenu !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var i = 1;
$('#question').each(function() {
    $(this).text(i++);
});
</script>
@endsection
