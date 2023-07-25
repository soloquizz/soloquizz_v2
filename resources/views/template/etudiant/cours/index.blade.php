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

        <div class="container page__container">
            <div class="page-section">

                <div class="page-heading">
                    <h4>Mes cours</h4>
                </div>

                <div class="mb-lg-8pt mt-3">
                    <div class="position-relative carousel-card">
                        <div class="row" id="carousel-courses1">
                            @foreach($cours as $cour)
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center">
                                            <a href="{{route('etudiant.cours.show',$cour->id)}}">
                                                <img src="{{$cour->image()}}" class="img-fluid"
                                                     style="height: 150px!important; width: 200px!important; align-content: center!important;">
                                            </a>
                                        </div>
                                        <div class="card-footer justify-content-center text-center">
                                            <a class="text-center"
                                               href="{{route('etudiant.cours.show',$cour->id)}}">{{$cour->nom}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

