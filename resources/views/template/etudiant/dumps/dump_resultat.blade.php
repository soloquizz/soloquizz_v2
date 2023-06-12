@extends('layouts.template.etudiant.master')


@section('content_page')
    <div class="mdk-header-layout__content page-content">
        <div class="navbar navbar-list navbar-submenu navbar-light border-0 navbar-expand-sm" style="white-space: nowrap;">
            <div class="container page__container">
                <nav class="nav navbar-nav">
                    <div class="nav-item navbar-list__item">
                        <a href="student-take-course.html" class="nav-link"><i class="material-icons icon--left">keyboard_backspace</i> Back to Course</a>
                    </div>
                    <div class="nav-item navbar-list__item">
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="mr-16pt">
                                <a href="student-take-course.html"><img src="{{asset('assets/images/paths/angular_64x64.png')}}" width="40" alt="Angular" class="rounded"></a>
                            </div>
                            <div class="flex">
                                <a href="student-take-course.html" class="card-title text-body mb-0">Angular Fundamentals</a>
                                <p class="lh-1 d-flex align-items-center mb-0">
                                    <span class="text-50 small font-weight-bold mr-8pt">Elijah Murray</span>
                                    <span class="text-50 small">Software Engineer and Developer</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="mdk-box bg-dark mdk-box--bg-gradient-primary js-mdk-box mb-0" data-effects="blend-background">
            <div class="mdk-box__content">
                <div class="py-64pt text-center text-sm-left">
                    <div class="container d-flex flex-column justify-content-center align-items-center">
                        <p class="lead text-white-50 measure-lead-max mb-0">Submited on 02 Jan 2019</p>
                        <h1 class="text-white mb-24pt">Your Score: 350</h1>
                        <a href="student-take-quiz.html" class="btn btn-outline-white">Restart quiz</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-sm navbar-light navbar-submenu navbar-list p-0 m-0 align-items-center">
            <div class="container page__container">
                <ul class="nav navbar-nav flex align-items-sm-center">
                    <li class="nav-item navbar-list__item">350/450 Score</li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">schedule</i>
                        12 minutes
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">assessment</i>
                        Intermediate
                    </li>
                </ul>
            </div>
        </div>
        <div class="container page__container">
            <div class="border-left-2 page-section pl-32pt">
                <div class="d-flex align-items-center page-num-container mb-16pt">
                    <div class="page-num">2</div>
                    <h4>Question 2 of 5</h4>
                </div>
                <p class="text-70 mb-32pt mb-lg-48pt">An angular 2 project written in typescript is* transpiled to javascript duri*ng the build process. Which of the following additional features are provided to the developer while programming on typescript over javascript?</p>
                <ul class="list-quiz mb-32pt mb-lg-64pt">
                    <li class="list-quiz-item">
                        <span class="list-quiz-badge">A</span>
                        <span class="list-quiz-text">Ability to use newer syntax and offers reliability</span>
                    </li>
                    <li class="list-quiz-item active">
                        <span class="list-quiz-badge list-quiz-badge-success"><i class="material-icons">check</i></span>
                        <span class="list-quiz-text">Compatibility</span>
                    </li>
                    <li class="list-quiz-item">
                        <span class="list-quiz-badge list-quiz-badge-error">C</span>
                        <span class="list-quiz-text">Usage of missing features</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
