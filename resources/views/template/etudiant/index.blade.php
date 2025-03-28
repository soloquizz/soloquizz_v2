@extends('layouts.template.etudiant.master')

@section('title')
    Tableau de Bord
@endsection

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.etudiant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.etudiant.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        {{--
            <div class="container page__container">
            <div class="page-section">
                <div class="card border-left-4 border-left-accent card-sm mb-lg-32pt">
                    <div class="card-body pl-16pt">
                        <div class="media flex-wrap align-items-center">
                            <div class="media-left">
                                <i class="material-icons text-50">access_time</i>
                            </div>
                            <div class="media-body" style="min-width: 180px">
                                Your subscription ends on <strong>25 February 2015</strong>
                            </div>
                            <div class="media-right mt-2 mt-sm-0">
                                <a class="btn btn-link text-secondary" href="student-billing.html">Upgrade</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-lg-8pt">
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="h2 mb-0 mr-3 text-accent">116</div>
                                <div class="flex">
                                    <p class="mb-0"><strong>Angular</strong></p>
                                    <p class="text-50 mb-0 mt-n1">Best score</p>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle text-70" data-toggle="dropdown">Popular Topics</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="" class="dropdown-item">Popular Topics</a>
                                        <a href="" class="dropdown-item">Web Design</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-24pt">
                                <div class="chart" style="height: 344px;">
                                    <canvas id="topicIqChart" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-header d-flex align-items-center border-0">
                                <div class="h2 mb-0 mr-3 text-accent">432</div>
                                <div class="flex">
                                    <p class="mb-0"><strong>Experience IQ</strong></p>
                                    <p class="text-50 mb-0 mt-n1">4 days streak this week</p>
                                </div>
                                <i class="material-icons text-muted ml-2">trending_up</i>
                            </div>
                            <div class="card-body pt-0">
                                <div class="chart" style="height: 128px;">
                                    <canvas id="iqChart" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>







                        <div id="carouselExampleFade" class="carousel carousel-card slide mb-24pt">
                            <div class="carousel-inner">

                                <div class="carousel-item active">

                                    <a class="card mb-0" href="">
                                        <img src="assets/images/achievements/flinto.png" alt="Flinto" class="card-img" style="max-height: 100%; width: initial;">
                                        <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                        <span class="card-body fullbleed">
                                                    <span class="row">
                                                        <span class="col-5 text-center">
                                                            <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                            <span class="text-white-60 d-block mb-16pt">Jun 5, 2018</span>
                                                            <img src="assets/images/illustration/achievement/128/white.png" alt="achievement">
                                                        </span>
                                                        <span class="col-7 d-flex flex-column">
                                                            <span class="text-right flex">
                                                                <img src="assets/images/paths/flinto_40x40@2x.png" width="64" alt="Flinto" class="rounded">
                                                            </span>
                                                            <span>
                                                                <span class="h4 text-white m-0 d-block">Flinto</span>
                                                                <span class="text-white-60">Introduction to The App Design Application</span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                    </a>

                                </div>

                                <div class="carousel-item">

                                    <a class="card mb-0" href="">
                                        <img src="assets/images/achievements/angular.png" alt="Angular fundamentals" class="card-img" style="max-height: 100%; width: initial;">
                                        <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                        <span class="card-body fullbleed">
                                                    <span class="row">
                                                        <span class="col-5 text-center">
                                                            <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                            <span class="text-white-60 d-block mb-16pt">Jun 5, 2018</span>
                                                            <img src="assets/images/illustration/achievement/128/white.png" alt="achievement">
                                                        </span>
                                                        <span class="col-7 d-flex flex-column">
                                                            <span class="text-right flex">
                                                                <img src="assets/images/paths/angular_40x40@2x.png" width="64" alt="Angular fundamentals" class="rounded">
                                                            </span>
                                                            <span>
                                                                <span class="h4 text-white m-0 d-block">Angular fundamentals</span>
                                                                <span class="text-white-60">Creating and Communicating Between Angular Components</span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                    </a>

                                </div>

                            </div>
                            <!-- <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_left</span>
        <span class="sr-only">Previous</span>
        </a> -->
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    </div>
                </div>

                <div class="row mb-lg-8pt">
                    <div class="col-lg-6 mb-8pt mb-sm-0">
                        <div class="page-heading">
                            <h4>Learning Paths</h4>
                            <a href="student-my-courses.html" class="text-underline ml-sm-auto">My learning paths</a>
                        </div>




                        <div class="card card-path js-overlay stack stack--1 mb-16pt" data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="assets/images/paths/angular_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                    <span class="overlay__content overlay__content-transparent">
                                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                    <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                                </span>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title text-body mb-0">Angular</div>
                                                <div class="text-muted d-flex lh-1">24 courses</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="path.html" class="ml-4pt btn btn-link text-secondary">Resume</a>
                                </div>
                            </div>
                        </div>
                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left">
                                    <img src="assets/images/paths/angular_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title mb-0">Angular</div>
                                    <span class="text-black-50 d-flex lh-1">18 courses</span>
                                </div>
                            </div>

                            <div class="my-32pt">
                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                    <div class="d-flex align-items-center mr-8pt">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                    <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <small class="text-black-50 mr-8pt">Your rating</small>
                                <div class="rating mr-8pt">
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                </div>
                                <small class="text-black-50">4/5</small>
                            </div>
                        </div>


                        <div class="card card-path js-overlay stack stack--1 mb-16pt" data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="assets/images/paths/swift_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                    <span class="overlay__content overlay__content-transparent">
                                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                    <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                                </span>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title text-body mb-0">Swift</div>
                                                <div class="text-muted d-flex lh-1">24 courses</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="path.html" class="ml-4pt btn btn-link text-secondary border-1 border-secondary">Resume</a>
                                </div>
                            </div>
                        </div>
                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left">
                                    <img src="assets/images/paths/swift_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title mb-0">Swift</div>
                                    <span class="text-black-50 d-flex lh-1">18 courses</span>
                                </div>
                            </div>

                            <div class="my-32pt">
                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                    <div class="d-flex align-items-center mr-8pt">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                    <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <small class="text-black-50 mr-8pt">Your rating</small>
                                <div class="rating mr-8pt">
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                </div>
                                <small class="text-black-50">4/5</small>
                            </div>
                        </div>


                        <div class="card card-path js-overlay stack stack--1 mb-16pt" data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="assets/images/paths/react_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                    <span class="overlay__content overlay__content-transparent">
                                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                    <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                                </span>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title text-body mb-0">React Native</div>
                                                <div class="text-muted d-flex lh-1">24 courses</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="path.html" class="ml-4pt btn btn-link text-secondary">Resume</a>
                                </div>
                            </div>
                        </div>
                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left">
                                    <img src="assets/images/paths/react_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title mb-0">React Native</div>
                                    <span class="text-black-50 d-flex lh-1">18 courses</span>
                                </div>
                            </div>

                            <div class="my-32pt">
                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                    <div class="d-flex align-items-center mr-8pt">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="path.html" class="btn btn-primary mr-8pt">Resume</a>
                                    <a href="path.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <small class="text-black-50 mr-8pt">Your rating</small>
                                <div class="rating mr-8pt">
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                </div>
                                <small class="text-black-50">4/5</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="page-heading">
                            <h4>Courses</h4>
                            <a href="student-my-courses.html" class="text-underline ml-sm-auto">My courses</a>
                        </div>



                        <div class="position-relative carousel-card">
                            <div class="js-mdk-carousel row d-block" id="carousel-courses1">

                                <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-courses1" role="button" data-slide="next">
                                    <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <div class="mdk-carousel__content">

                                    <div class="col-12 col-sm-6">

                                        <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                            <a href="student-take-course.html" class="js-image" data-position="">
                                                <img src="assets/images/paths/angular_430x168.png" alt="course">
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
                                                            <a class="card-title" href="student-take-course.html">Learn Angular fundamentals</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-take-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="assets/images/paths/angular_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Learn Angular fundamentals</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-black-50 small">with</span>
                                                        <span class="text-black-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html" class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-black-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-black-50">4/5</small>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                            <a href="student-take-course.html" class="js-image" data-position="">
                                                <img src="assets/images/paths/swift_430x168.png" alt="course">
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
                                                            <a class="card-title" href="student-take-course.html">Build an iOS Application in Swift</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-take-course.html" class="ml-4pt material-icons text-accent card-course__icon-favorite">favorite</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="assets/images/paths/swift_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Build an iOS Application in Swift</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-black-50 small">with</span>
                                                        <span class="text-black-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html" class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-black-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-black-50">4/5</small>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="col-12 col-sm-6">

                                        <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                            <a href="student-take-course.html" class="js-image" data-position="">
                                                <img src="assets/images/paths/wordpress_430x168.png" alt="course">
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
                                                            <a class="card-title" href="student-take-course.html">Build a WordPress Website</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-take-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="assets/images/paths/wordpress_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Build a WordPress Website</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-black-50 small">with</span>
                                                        <span class="text-black-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>


                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html" class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <small class="text-black-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-black-50">4/5</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                                            <a href="student-take-course.html" class="js-image" data-position="left">
                                                <img src="assets/images/paths/react_430x168.png" alt="course">
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
                                                            <a class="card-title" href="student-take-course.html">Become a React Native Developer</a>
                                                            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                                                        </div>
                                                        <a href="student-take-course.html" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="rating flex">
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                                            <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                        </div>
                                                        <small class="text-50">6 hours</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popoverContainer d-none">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="assets/images/paths/react_40x40@2x.png" width="40" height="40" alt="Angular" class="rounded">
                                                </div>
                                                <div class="media-body">
                                                    <div class="card-title mb-0">Become a React Native Developer</div>
                                                    <p class="lh-1 mb-0">
                                                        <span class="text-black-50 small">with</span>
                                                        <span class="text-black-50 small font-weight-bold">Elijah Murray</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="my-32pt">
                                                <div class="d-flex align-items-center mb-8pt justify-content-center">
                                                    <div class="d-flex align-items-center mr-8pt">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                                        <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="student-take-lesson.html" class="btn btn-primary mr-8pt">Resume</a>
                                                    <a href="student-take-course.html" class="btn btn-outline-secondary ml-0">Start over</a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <small class="text-black-50 mr-8pt">Your rating</small>
                                                <div class="rating mr-8pt">
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                                    <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                                </div>
                                                <small class="text-black-50">4/5</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>Discussions</h4>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center" style="white-space: nowrap;">
                            <div class="col-lg-auto">
                                <form class="search-form search-form--light d-lg-inline-flex mb-8pt mb-lg-0" action="student-discussions.html">
                                    <input type="text" class="form-control w-lg-auto" placeholder="Search discussions">
                                    <button class="btn" type="submit" role="button"><i class="material-icons">search</i></button>
                                </form>
                            </div>
                            <div class="col-lg d-flex flex-wrap align-items-center">
                                <div class="ml-lg-auto dropdown">
                                    <a href="#" class="btn btn-link dropdown-toggle text-70" data-toggle="dropdown">My Posts</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="" class="dropdown-item active">My Posts</a>
                                        <a href="" class="dropdown-item">All Posts</a>
                                    </div>
                                </div>
                                <a href="student-discussions-ask.html" class="btn btn-outline-secondary">Ask a question</a>
                            </div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-8pt mb-md-0">
                                    <div class="media">
                                        <div class="media-left mr-16pt">
                                            <a href="student-profile.html"><img src="assets/images/people/110/guy-1.jpg" width="40" alt="avatar" class="rounded-circle"></a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="text-muted m-0">2 days ago</p>
                                            <p class="m-0"><a href="student-profile.html" class="text-body">Laza Bogdan</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <p class="mb-8pt"><a href="student-discussion.html" class="text-body"><strong>Using Angular HttpClientModule instead of HttpModule</strong></a></p>
                                    <a href="student-discussion.html" class="chip chip-outline-secondary">Angular fundamentals</a>
                                </div>
                                <div class="col-auto d-flex flex-column align-items-center justify-content-center">
                                    <h5 class="m-0">1</h5>
                                    <p class="lh-1 mb-0"><small class="text-70">answers</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-8pt mb-md-0">
                                    <div class="media">
                                        <div class="media-left mr-16pt">
                                            <a href="student-profile.html"><img src="assets/images/people/110/guy-2.jpg" width="40" alt="avatar" class="rounded-circle"></a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="text-muted m-0">3 days ago</p>
                                            <p class="m-0"><a href="student-profile.html" class="text-body">Adam Curtis</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <p class="mb-0"><a href="student-discussion.html" class="text-body"><strong>Why am I getting an error when trying to install angular/http@2.4.2</strong></a></p>
                                </div>
                                <div class="col-auto d-flex flex-column align-items-center justify-content-center">
                                    <h5 class="m-0">1</h5>
                                    <p class="lh-1 mb-0"><small class="text-70">answers</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="student-discussions.html" class="text-underline">View more discussions</a>
                    </div>
                </div>

            </div>
        </div>
        --}}


        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

