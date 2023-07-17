<!-- Header -->
<div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
    <div class="mdk-header__content">
        <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>
            <!-- Navbar toggler -->

            <!-- Navbar Brand -->
            <a href="{{ url('/') }}" class="navbar-brand">
                <img class="navbar-brand-icon mr-0 mr-md-8pt" src="{{asset('/assets/images/logo/Soloquizz.png')}}" width="150" alt="Soloquiz">
                <span class="d-none d-md-block"></span>
            </a>
            <!-- Main Navigation -->
            <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                <li class="ml-16pt nav-item">
                    <a href="{{route('auth.index')}}" class="nav-link">
                        <i class="material-icons">lock_open</i>
                        <span class="sr-only">Login</span>
                    </a>
                </li>
                <li class="d-none d-sm-flex nav-item">
                    <a href="{{route('auth.register')}}" class="btn btn-primary">S'enregistrer</a>
                </li>
            </ul>
            <!-- // END Main Navigation -->
        </div>
    </div>
</div>
<!-- // END Header -->
