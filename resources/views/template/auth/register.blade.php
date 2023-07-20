@extends('layouts.template.auth.master')

@section('content_page')

    <div class="mdk-header-layout__content page-content pb-0">
        <div class="bg-gradient-primary py-32pt">
            <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                <img src="{{asset('assets/images/illustration/student/128/white.svg')}}" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
                <div class="flex mb-32pt mb-md-0">
                    <h1 class="text-white mb-0">Régistration</h1>
                </div>
            </div>
        </div>
        <div class="bg-white pt-32pt pt-sm-64pt pb-32pt">
            <div class="row justify-content-center mt-5">
                @include('adminlte-templates::common.errors')
            </div>
            <div class="container page__container">
                <form action="{{ route('auth.register.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Numéro carte:</label>
                            <input id="email" type="text" class="form-control" name="numero_carte" value="{{ old('numero_carte') }}" required placeholder="202209815HML">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Classe:</label>
                            <select class="form-control" name="classe_id">
                                <option value="">Veuillez choisir votre classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->nom}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="annee_scolaire_id" value="{{$annee_scolaire->id}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Prénom:</label>
                            <input id="email" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required placeholder="Modou">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Nom:</label>
                            <input id="email" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required placeholder="FALL">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Téléphone:</label>
                            <input id="email" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required placeholder="+221 770981234">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Email:</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="moudoufall@gmail.com">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-outline-primary">Enregistrer</button>
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
