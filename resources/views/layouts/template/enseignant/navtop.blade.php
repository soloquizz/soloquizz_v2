<!-- Header -->
<div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
    <div class="mdk-header__content">
        <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>
            <!-- Navbar toggler -->
            <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Brand -->
            <a href="{{ route('enseignant.index') }}" class="navbar-brand">
                <img class="navbar-brand-icon mr-0 mr-md-8pt" src="{{asset('/assets/images/logo/Soloquizz.png')}}" width="150" alt="Tutorio">
                <span class="d-none d-md-block"></span>
            </a>
            {{--
                <button class="btn btn-black mr-16pt" data-toggle="modal" data-target="#courses">Courses <i class="material-icons">arrow_drop_down</i></button>

                <form class="search-form search-form--black search-form-courses d-none d-md-flex" action="library-filters.html">
                    <input type="text" class="form-control" placeholder="What would you like to learn?">
                    <button class="btn" type="submit" role="button"><i class="material-icons">search</i></button>
                </form>
            --}}
            <!-- Main Navigation -->
            <nav class="nav navbar-nav ml-auto flex-nowrap">
                <div class="nav-item dropdown d-none d-sm-flex ml-16pt">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img width="32" height="32" class="rounded-circle" src="{{asset('assets/images/people/50/user.png')}}" alt="student" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item active" href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;{{auth()->user()->getFullName()}}</a>
                        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>&nbsp;&nbsp;
                            Déconnexion
                        </a>
                    </div>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <!-- Notifications dropdown -->
                <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                    <!--button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false">
                        <i class="material-icons">notifications</i>
                        <span class="badge badge-notifications badge-danger"></span>
                    </button-->
                    {{--
                        <div class="dropdown-menu dropdown-menu-right">
                        <div data-perfect-scrollbar class="position-relative">
                            <div class="dropdown-header"><strong>Messages</strong></div>
                            <div class="list-group list-group-flush mb-0">

                                <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 minutes ago</small>

                                                <span class="ml-auto unread-indicator bg-accent"></span>

                                            </span>
                                    <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Michelle</strong>
                                                    <span class="text-black-70">Clients loved the new design.</span>
                                                </span>
                                            </span>
                                </a>

                                <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 minutes ago</small>

                                                <span class="ml-auto unread-indicator bg-accent"></span>

                                            </span>
                                    <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Michelle</strong>
                                                    <span class="text-black-70">🔥 Superb job..</span>
                                                </span>
                                            </span>
                                </a>

                            </div>

                            <div class="dropdown-header"><strong>System notifications</strong></div>
                            <div class="list-group list-group-flush mb-0">

                                <a href="javascript:void(0);" class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">3 minutes ago</small>

                                            </span>
                                    <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-danger">account_circle</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                                </span>
                                            </span>
                                </a>

                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 hours ago</small>

                                            </span>
                                    <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-success">group_add</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Adrian. D</strong>
                                                    <span class="text-black-70">Wants to join your private group.</span>
                                                </span>
                                            </span>
                                </a>

                                <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">1 day ago</small>

                                            </span>
                                    <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-warning">storage</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70">Your deploy was successful.</span>
                                                </span>
                                            </span>
                                </a>

                            </div>
                        </div>
                    </div>
                    --}}
                </li>
                <!-- // END Notifications dropdown -->
            </nav>
            <!-- // END Main Navigation -->
        </div>
    </div>
</div>
<!-- // END Header -->
