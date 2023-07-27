@extends('layouts.template.auth.master')

@section('content_page')

    <div class="mdk-header-layout__content page-content pb-0">
        <div class="bg-gradient-primary py-32pt">
            <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                <img src="{{asset('assets/images/illustration/student/128/white.svg')}}" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
                <div class="flex mb-32pt mb-md-0">
                    <h1 class="text-white mb-0">Connexion</h1>
                </div>
                {{--
                    <a href="{{route('auth.register')}}" class="btn btn-outline-white flex-column">
                    Vous n'avez pas encore de compte
                    <span class="btn__secondary-text">Créez-en maintenant!</span>
                    </a>
                 --}}
            </div>
        </div>
        <div class="bg-white pt-32pt pt-sm-64pt pb-32pt">
            <div class="row justify-content-center mt-5">
                @include('adminlte-templates::common.errors')
            </div>
            <div class="container page__container">
                <form action="{{ route('auth.reset.password.post') }}" method="post" class="col-md-5 p-0 mx-auto">
                    @csrf
                    
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="email1">Email address</label>
                            <input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" required placeholder="Votre adresse email institutionnel...">
                            <small id="emailHelp" class="form-text text-muted">Your information is safe with us.</small>
                          </div>
                          <div class="form-group">
                            <label for="email1">Code</label>
                            <input type="text" class="form-control" id="email1" name="token" aria-describedby="emailHelp" required placeholder="Entrez le code...">
                          </div>
                          <div class="form-group">
                            <label for="password1">Mot de passe</label>
                            <input type="password" class="form-control" id="password1" name="password" placeholder="Votre mot de passe ...">
                          </div>
                          <div class="form-group">
                            <label for="password1">Confirmer Mot de passe</label>
                            <input type="password" class="form-control" id="password1" name="password_confirmation" placeholder="Confirmer votre mot de passe ...">
                          </div>
                         
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button class="btn btn-lg btn-outline-primary">Connexion</button>
                        </div>
                    
                </form>
            </div>
        </div>

        <!--div class="page-separator m-0">
            <div class="page-separator__text">or sign-in with</div>
            <div class="page-separator__bg-top bg-white"></div>
        </div>
        <div class="bg-body pt-32pt pb-32pt pb-md-64pt text-center">
            <div class="container page__container">
                <a href="student-dashboard.html" class="btn btn-lg btn-secondary btn-block-xs">Facebook</a>
                <a href="student-dashboard.html" class="btn btn-lg btn-secondary btn-block-xs">Twitter</a>
                <a href="student-dashboard.html" class="btn btn-lg btn-secondary btn-block-xs">Google+</a>
            </div>
        </div-->
    </div>

@endsection
