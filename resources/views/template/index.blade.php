@extends('layouts.template.master')

@section('content')
    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="row align-items-end mb-16pt mb-md-32pt">
                <div class="col-md-auto mb-32pt mb-md-0">
                    <div class="page-headline page-headline--title text-center text-md-left p-0">
                        <h2>Les meilleurs exercices de certification</h2>
                    </div>
                </div>
                <div class="col-md text-center text-md-right d-flex justify-content-md-end align-items-center flex-wrap" style="white-space: nowrap;">
                    <!--h5 class="mr-24pt mb-md-0 d-md-inline-block">Sujets populaires</h5-->
                    <p class="chip mb-16pt mb-md-0 chip-outline-secondary">Fortinet</p>
                    <p class="chip mb-16pt mb-md-0 chip-outline-secondary">CEH</p>
                    <p class="chip mb-16pt mb-md-0 chip-outline-secondary">Linux</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                        <a href="" class="js-image" data-position="center">
                            <img src="{{ asset('/assets/images/soloimages/fortinet2.png') }}" style="width: 640px; height: 245px;" alt="mathematics">
                            <span class="overlay__content">
                                    <span class="overlay__action d-flex flex-column text-center">
                                        <i class="material-icons">play_circle_outline</i>
                                        <small>Aperçu du cours</small>
                                    </span>
                                </span>
                        </a>
                        <div class="mdk-reveal__content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title" href="#">Certification Fortinet</a>
                                    </div>
                                    <a href="#" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                </div>
                                <div class="d-flex">

                                    <small class="text-50">6 heures</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('/assets/images/soloimages/Fortinet.png') }}" width="40" height="40" alt="mathematics" class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">Certification Fortinet</div>
                                <p class="lh-1 mb-0">
                                    <span class="text-black-50 small">avec</span>
                                    <span class="text-black-50 small font-weight-bold">300 questions disponibles</span>
                                </p>
                            </div>
                        </div>
                        <p class="my-16pt text-black-70">Avec soloquizz entraînez vous autant que vous voulez</p>
                        <div class="mb-16pt">
                            <small>Les différents thèmes de la certification</small>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale S1</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale S2</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale L2</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Troisieme Secondaire</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Enfin faire les quizzes</small></p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                    <p class="flex text-black-50 lh-1 mb-0"><small>Débutant</small></p>
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('/login')}}" class="btn btn-primary">Commencer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                        <a href="" class="js-image" data-position="center">
                            <img src="{{ asset('/assets/images/soloimages/CEH2.jpg') }}" style="width: 624px; height: 245px;" alt="mathematics">
                            <span class="overlay__content">
                                    <span class="overlay__action d-flex flex-column text-center">
                                        <i class="material-icons">play_circle_outline</i>
                                        <small>Aperçu du cours</small>
                                    </span>
                                </span>
                        </a>
                        <div class="mdk-reveal__content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title" href="#">Préparer les ceritifications CEH</a>
                                    </div>
                                    <a href="#" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                </div>
                                <div class="d-flex">

                                    <small class="text-50">6 heures</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('/assets/images/soloimages/CEH.png') }}" width="40" height="40" alt="mathematics" class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">Certification Fortinet</div>
                                <p class="lh-1 mb-0">
                                    <span class="text-black-50 small">avec</span>
                                    <span class="text-black-50 small font-weight-bold">300 questions disponibles</span>
                                </p>
                            </div>
                        </div>
                        <p class="my-16pt text-black-70">Avec soloquizz entraînez vous autant que vous voulez</p>
                        <div class="mb-16pt">
                            <small>Les différents thèmes de la certification</small>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale S1</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale S2</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale L2</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Troisieme Secondaire</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Enfin faire les quizzes</small></p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                    <p class="flex text-black-50 lh-1 mb-0"><small>Débutant</small></p>
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('/login')}}" class="btn btn-primary">Commencer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                        <a href="" class="js-image" data-position="center">
                            <img src="{{ asset('/assets/images/soloimages/linux2.jpg') }}" style="width: 640px; height: 245px;" alt="mathematics">
                            <span class="overlay__content">
                                    <span class="overlay__action d-flex flex-column text-center">
                                        <i class="material-icons">play_circle_outline</i>
                                        <small>Aperçu du cours</small>
                                    </span>
                                </span>
                        </a>
                        <div class="mdk-reveal__content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title" href="#">Préparer les ceritifications LPIC</a>
                                    </div>
                                    <a href="#" class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite</a>
                                </div>
                                <div class="d-flex">

                                    <small class="text-50">6 heures</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('/assets/images/soloimages/linux.png') }}" width="40" height="40" alt="mathematics" class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">Certification Fortinet</div>
                                <p class="lh-1 mb-0">
                                    <span class="text-black-50 small">avec</span>
                                    <span class="text-black-50 small font-weight-bold">300 questions disponibles</span>
                                </p>
                            </div>
                        </div>
                        <p class="my-16pt text-black-70">Avec soloquizz entraînez vous autant que vous voulez</p>
                        <div class="mb-16pt">
                            <small>Les différents thèmes de la certification</small>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale S1</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale S2</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Terminale L2</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Programme Troisieme Secondaire</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-8pt">check</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Enfin faire les quizzes</small></p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                    <p class="flex text-black-50 lh-1 mb-0"><small>Débutant</small></p>
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('/login')}}" class="btn btn-primary">Commencer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
