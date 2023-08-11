@extends('layouts.template.enseignant.master')

@section('title')
    Changement de mot de passe
@endsection

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.enseignant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.enseignant.menu')
        <!-- END Menu Layout -->

        <div class="row justify-content-center mt-5">
            @include('adminlte-templates::common.errors')
        </div>

        <!-- Section Pages Layout -->

        <div class="container card bg-white page__container page-section mt-5">
            <form method="POST" action="{{ route('enseignant.password.change.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Mot de pass
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" name="password" class="form-control" required="">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Confirmation du mot de passe
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                               required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                </div>
            </form>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

