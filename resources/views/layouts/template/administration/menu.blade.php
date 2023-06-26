<div class="navbar navbar-expand-sm navbar-dark-white bg-gradient-primary p-sm-0 ">
    <div class="container page__container">
        <!-- Navbar toggler -->
        <button class="navbar-toggler ml-n16pt" type="button" data-toggle="collapse" data-target="#navbar-submenu2">
            <span class="material-icons">people_outline</span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-submenu2">
            <div class="navbar-collapse__content pb-16pt pb-sm-0">
                <ul class="nav navbar-nav">
                    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{route('admin.index')}}" class="nav-link">Tableau de Bord</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is(['admin/administrateurs*','admin/etudiants*']) ? 'active' : '' }}" data-toggle="dropdown">Utilisateurs</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Request::is(['admin/administrateurs*']) ? 'active' : '' }}" href="{{route('admin.administrateurs.index')}}">Administrateurs</a>
                            <a class="dropdown-item {{ Request::is(['admin/etudiants*']) ? 'active' : '' }}" href="{{route('admin.etudiants.index')}}">Étudiants</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is(['admin/editeurs*','admin/certifications*','admin/questions*','admin/options*']) ? 'active' : '' }}" data-toggle="dropdown">Certifications</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Request::is(['admin/editeurs*']) ? 'active' : '' }}" href="{{route('admin.editeurs.index')}}">Éditeur</a>
                            <a class="dropdown-item {{ Request::is(['admin/certifications*']) ? 'active' : '' }}" href="{{route('admin.certifications.index')}}">Certifications</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is(['admin/parcours*','admin/niveaux*','admin/domaines*','admin/anneeScolaires*']) ? 'active' : '' }}" data-toggle="dropdown">Paramétres</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Request::is(['admin/domaines*']) ? 'active' : '' }}" href="{{route('admin.domaines.index')}}">Domaines</a>
                            <a class="dropdown-item {{ Request::is(['admin/parcours*']) ? 'active' : '' }}" href="{{route('admin.parcours.index')}}">Parcours</a>
                            <a class="dropdown-item {{ Request::is(['admin/niveaux*']) ? 'active' : '' }}" href="{{route('admin.niveaux.index')}}">Niveaux</a>
                            <a class="dropdown-item {{ Request::is(['admin/anneeScolaires*']) ? 'active' : '' }}" href="{{route('admin.anneeScolaires.index')}}">Année Scolaires</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is(['admin/classes*']) ? 'active' : '' }}" href="{{route('admin.classes.index')}}">Classes</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
