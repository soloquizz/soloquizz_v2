<div class="navbar navbar-expand-sm navbar-dark-white bg-gradient-primary p-sm-0 ">
    <div class="container page__container">

        <!-- Navbar toggler -->
        <button class="navbar-toggler ml-n16pt" type="button" data-toggle="collapse" data-target="#navbar-submenu2">
            <span class="material-icons">people_outline</span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-submenu2">
            @if(auth()->user()->personne_type=='Etudiant')
                <div class="navbar-collapse__content pb-16pt pb-sm-0">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{ Request::is('etudiant') ? 'active' : '' }}">
                            <a href="#" class="nav-link">Tableau de Bord</a>
                        </li>
                        <li class="nav-item {{ Request::is('etudiant/cours*') ? 'active' : '' }}">
                            <a href="{{route('etudiant.cours')}}" class="nav-link">Cours</a>
                        </li>
                        <li class="nav-item {{ Request::is('etudiant/devoir*') ? 'active' : '' }}">
                            <a href="#" class="nav-link">Evaluations</a>
                        </li>
                        <li class="nav-item {{ Request::is('etudiant/certifications*') ? 'active' : '' }}">
                            <a href="{{route('etudiant.certifications')}}" class="nav-link">Certifications</a>
                        </li>
                        <li class="nav-item {{ Request::is('etudiant/discussions*') ? 'active' : '' }}">
                            <a href="#" class="nav-link">Forums</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('etudiant.password.change.show')}}" class="nav-link {{ Request::is(['etudiant/password-change-show*']) ? 'active' : '' }}">Profile</a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="navbar-collapse__content pb-16pt pb-sm-0">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{ Request::is('etudiant/certifications*') ? 'active' : '' }}">
                            <a href="{{route('etudiant.certifications')}}" class="nav-link">Test d'entrée</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
