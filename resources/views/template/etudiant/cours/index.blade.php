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

        <div class="page-section bg-white border-bottom-2">
            <div class="container page__container">
                <div class="card">
                    <img src="{{asset('assets/images/paths/typescript_892x286.png')}}" alt="TypeScript" class="card-img" style="max-height: 100%; width: initial;">
                    <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                    <img src="{{asset('assets/images/paths/typescript_64x64.svg')}}" width="64" alt="Instruduction to TypeScript" class="rounded position-absolute" style="right: 1rem; top: 1rem;">
                    <div class="card-body d-flex align-items-center justify-content-center fullbleed">
                        <div>
                            <h2 class="text-white mb-16pt">Introduction to TypeScript</h2>
                            <div class="d-flex align-items-center mb-16pt justify-content-center">
                                <div class="d-flex align-items-center mr-16pt">
                                    <span class="material-icons icon-16pt text-white-50 mr-4pt">access_time</span>
                                    <p class="flex text-white-50 lh-1 mb-0">50 minutes left</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-white-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-white-50 lh-1 mb-0">12 lessons</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="student-take-lesson.html" class="btn btn-white mr-8pt">Resume</a>
                                <a href="student-take-course.html" class="btn btn-outline-white ml-0">Start over</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-start">
                    <div class="d-flex mr-24pt">
                        <a href="student-take-course.html" class="mr-16pt">
                            <img src="{{asset('assets/images/paths/angular_40x40.svg')}}" alt="Angular" class="rounded">
                        </a>
                        <div class="flex">
                            <a class="text-body" href="student-take-course.html"><strong>Angular Fundamentals</strong></a><br>
                            <p class="lh-1 mb-0">
                                <span class="text-50 small">with</span>
                                <span class="text-50 small">Elijah Murray</span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-4pt" style="white-space: nowrap;">
                        <small class="text-50 mr-8pt">Your rating</small>
                        <div class="rating mr-8pt">
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                        </div>
                        <small class="text-50">4/5</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="container page__container">
            <div class="page-section">

                <div class="page-heading">
                    <h4>Learning Paths</h4>
                    <a href="" class="text-underline ml-sm-auto">All my learning paths</a>
                </div>



                <div class="row mb-lg-8pt">
                    <div class="col-sm-6">

                        <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{asset('assets/images/paths/angular_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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
                                    <img src="{{asset('assets/images/paths/angular_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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

                    </div>
                    <div class="col-sm-6">

                        <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{asset('assets/images/paths/swift_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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
                                    <img src="{{asset('assets/images/paths/swift_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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

                    </div>
                    <div class="col-sm-6">

                        <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{asset('assets/images/paths/wordpress_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
                                                    <span class="overlay__content overlay__content-transparent">
                                                            <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                            </span>
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title text-body mb-0">WordPress</div>
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
                                    <img src="{{asset('assets/images/paths/wordpress_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title mb-0">WordPress</div>
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
                    <div class="col-sm-6">

                        <div class="card card-path js-overlay stack stack--1 " data-toggle="popover" data-trigger="click">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-16pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{asset('assets/images/paths/react_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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
                                    <img src="{{asset('assets/images/paths/react_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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
                </div>

                <div class="page-heading">
                    <h4>Courses</h4>
                    <a href="" class="text-underline ml-sm-auto">All my courses</a>
                </div>


                <div class="mb-lg-8pt">

                    <div class="position-relative carousel-card">
                        <div class="js-mdk-carousel row d-block" id="carousel-courses1">

                            <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-courses1" role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>

                            <div class="mdk-carousel__content">

                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                        <a href="student-take-course.html" class="js-image" data-position="">
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
                                                <img src="{{asset('assets/images/paths/angular_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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

                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                        <a href="student-take-course.html" class="js-image" data-position="">
                                            <img src="{{asset('assets/images/paths/swift_430x168.png')}}" alt="course">
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
                                                <img src="{{asset('assets/images/paths/swift_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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

                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                        <a href="student-take-course.html" class="js-image" data-position="">
                                            <img src="{{asset('assets/images/paths/wordpress_430x168.png')}}" alt="course">
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
                                                <img src="{{asset('assets/images/paths/wordpress_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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

                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">

                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">




                                        <a href="student-take-course.html" class="js-image" data-position="left">
                                            <img src="{{asset('assets/images/paths/react_430x168.png')}}" alt="course">
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
                                                <img src="{{asset('assets/images/paths/react_40x40@2x.png')}}" width="40" height="40" alt="Angular" class="rounded">
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

                <div class="page-heading">
                    <h4>Achievements</h4>
                    <a href="" class="text-underline ml-sm-auto">My achievements</a>
                </div>







                <div class="position-relative carousel-card">
                    <div class="js-mdk-carousel row d-block" id="carousel-achievements">

                        <a class="carousel-control-next js-mdk-carousel-control" href="#carousel-achievements" role="button" data-slide="next">
                            <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                            <span class="sr-only">Next</span>
                        </a>

                        <div class="mdk-carousel__content">

                            <div class="col-12 col-sm-6">

                                <a class="card mb-0" href="">
                                    <img src="{{asset('assets/images/achievements/flinto.png')}}" alt="Flinto" class="card-img" style="max-height: 100%; width: initial;">
                                    <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                    <span class="card-body fullbleed">
                                            <span class="row">
                                                <span class="col-5 text-center">
                                                    <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                    <span class="text-white-60 d-block mb-16pt">Jun 5, 2018</span>
                                                    <img src="{{asset('assets/images/illustration/achievement/128/white.png')}}" alt="achievement">
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

                            <div class="col-12 col-sm-6">

                                <a class="card mb-0" href="">
                                    <img src="{{asset('assets/images/achievements/angular.png')}}" alt="Angular fundamentals" class="card-img" style="max-height: 100%; width: initial;">
                                    <div class="fullbleed bg-primary" style="opacity: .5;"></div>
                                    <span class="card-body fullbleed">
                                            <span class="row">
                                                <span class="col-5 text-center">
                                                    <span class="h5 text-white text-uppercase font-weight-normal m-0 d-block">Achievement</span>
                                                    <span class="text-white-60 d-block mb-16pt">Jun 5, 2018</span>
                                                    <img src="{{asset('assets/images/illustration/achievement/128/white.png')}}" alt="achievement">
                                                </span>
                                                <span class="col-7 d-flex flex-column">
                                                    <span class="text-right flex">
                                                        <img src="{{asset('assets/images/paths/angular_40x40@2x.png')}}" width="64" alt="Angular fundamentals" class="rounded">
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
                    </div>
                </div>


            </div>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

