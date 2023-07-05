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

                <div class="mb-lg-8pt">
                    <div class="position-relative carousel-card">
                        <div class="row" id="carousel-courses1">
                            <div class="col-4">
                                <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                                    <a href="{{route('etudiant.cours.show',1)}}" class="js-image" data-position="">
                                        <img src="{{asset('assets/images/paths/angular_430x168.png')}}" alt="course">
                                        <span class="overlay__content">
                                            <span class="overlay__action d-flex flex-column text-center">
                                                <i class="material-icons">play_circle_outline</i>
                                                <small>Resume course</small>
                                            </span>
                                        </span>
                                    </a>
                                    <div class="mdk-reveal__content">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex">
                                                    <a class="card-title" href="student-take-course.html">Java</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

