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

        <div class="container page__container page-section">
            <a href="student-take-course.html" class="mb-heading d-flex align-items-center text-body">
                <span class="mr-16pt">
                    <img src="{{asset('assets/images/paths/angular_64x64.png')}}" width="40" alt="Angular Fundamentals" class="rounded">
                </span>
                <span class="d-flex flex-column flex">
                    <span class="h4 d-block m-0">Ec Council</span>
                    <span class="text-70">View course</span>
                </span>
            </a>
            <div class="card stack">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center px-16pt">
                        <div class="flex d-flex flex-column">
                            <a class="text-body" href="{{route('etudiant.dumps.resultat')}}">Fundamentals of Working with Angular</a>
                            <small class="text-muted">12 min ago</small>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="lead lh-1">5.8</span>
                            <small class="text-muted text-uppercase">Score</small>
                        </div>
                        <a href="{{route('etudiant.dumps.resultat')}}" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                    </div>
                    <div class="list-group-item d-flex align-items-center px-16pt">
                        <div class="flex d-flex flex-column">
                            <a class="text-body" href="{{route('etudiant.dumps.info')}}">Working with the Angular CLI</a>
                            <small class="text-muted">2 hrs ago</small>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="lead lh-1">10</span>
                            <small class="text-muted text-uppercase">Score</small>
                        </div>
                        <a href="student-quiz-result-details.html" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                    </div>
                    <div class="list-group-item d-flex align-items-center px-16pt">
                        <div class="flex d-flex flex-column">
                            <a class="text-body" href="student-quiz-result-details.html">Understanding Dependency Injection</a>
                            <small class="text-muted">3 hrs ago</small>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="lead lh-1">2.8</span>
                            <small class="text-muted text-uppercase">Score</small>
                        </div>
                        <a href="student-quiz-result-details.html" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                    </div>
                </div>
            </div>
            <br>
            <a href="student-take-course.html" class="mb-heading d-flex align-items-center text-body">
                <span class="mr-16pt">
                    <img src="{{asset('assets/images/paths/swift_40x40@2x.png')}}" width="40" alt="Build an iOS Application in Swift" class="rounded">
                </span>
                <span class="d-flex flex-column flex">
                    <span class="h4 d-block m-0">Fortinet</span>
                    <span class="text-70">View course</span>
                </span>
            </a>
            <div class="card stack">
                <div class="list-group list-group-flush">

                    <div class="list-group-item d-flex align-items-center px-16pt">
                        <div class="flex d-flex flex-column">
                            <a class="text-body" href="student-quiz-result-details.html">Your First iOS App</a>
                            <small class="text-muted">1 day ago</small>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="lead lh-1">5.8</span>
                            <small class="text-muted text-uppercase">Score</small>
                        </div>
                        <a href="student-quiz-result-details.html" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                    </div>

                    <div class="list-group-item d-flex align-items-center px-16pt">
                        <div class="flex d-flex flex-column">
                            <a class="text-body" href="student-quiz-result-details.html">Programming in Swift</a>
                            <small class="text-muted">2 days ago</small>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="lead lh-1">10</span>
                            <small class="text-muted text-uppercase">Score</small>
                        </div>
                        <a href="student-quiz-result-details.html" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                    </div>

                    <div class="list-group-item d-flex align-items-center px-16pt">
                        <div class="flex d-flex flex-column">
                            <a class="text-body" href="student-quiz-result-details.html">Beginning Table Views</a>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <span class="lead lh-1">2.8</span>
                            <small class="text-muted text-uppercase">Score</small>
                        </div>
                        <a href="student-quiz-result-details.html" class="text-muted ml-8pt"><i class="material-icons">chevron_right</i></a>
                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <ul class="pagination justify-content-center pagination-sm">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true" class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#" aria-label="1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="1">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true" class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection
