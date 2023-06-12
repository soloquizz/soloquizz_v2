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
                                    <a href="#" class="btn btn-link dropdown-toggle text-black-70" data-toggle="dropdown">All Topics</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="" class="dropdown-item active">All Topics</a>
                                        <a href="" class="dropdown-item">My Topics</a>
                                    </div>
                                </div>
                                <div class="dropdown mr-8pt">
                                    <a href="#" class="btn btn-link dropdown-toggle text-black-70" data-toggle="dropdown">Newest</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="" class="dropdown-item active">Newest</a>
                                        <a href="" class="dropdown-item">Unanswered</a>
                                    </div>
                                </div>
                                <a href="student-discussions-ask.html" class="btn btn-accent">Ask a question</a>
                            </div>
                        </div>
                    </div>


                    <div class="list-group list-group-flush">

                        <div class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-8pt mb-md-0">
                                    <div class="media">
                                        <div class="media-left mr-16pt">
                                            <a href="student-profile.html"><img src="{{asset('assets/images/people/110/guy-1.jpg')}}" width="40" alt="avatar" class="rounded-circle"></a>
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
                                            <a href="student-profile.html"><img src="{{asset('assets/images/people/110/guy-2.jpg')}}" width="40" alt="avatar" class="rounded-circle"></a>
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

                        <div class="list-group-item p-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-8pt mb-md-0">
                                    <div class="media">
                                        <div class="media-left mr-16pt">
                                            <a href="student-profile.html"><img src="{{asset('assets/images/people/110/woman-1.jpg')}}" width="40" alt="avatar" class="rounded-circle"></a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="text-muted m-0">4 days ago</p>
                                            <p class="m-0"><a href="student-profile.html" class="text-body">Emilie Howard</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <p class="mb-0"><a href="student-discussion.html" class="text-body"><strong>Using Angular HttpClientModule instead of HttpModule</strong></a></p>

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
                                            <a href="student-profile.html"><img src="{{asset('assets/images/people/110/guy-3.jpg')}}" width="40" alt="avatar" class="rounded-circle"></a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <p class="text-muted m-0">6 days ago</p>
                                            <p class="m-0"><a href="student-profile.html" class="text-body">Jason Klein</a></p>
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
                        <a href="" class="text-black-70 text-underline">View more discussions</a>
                    </div>
                </div>

            </div>
        </div>


        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection
