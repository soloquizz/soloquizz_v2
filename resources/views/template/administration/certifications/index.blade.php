@extends('layouts.template.administration.master')

@section('content_page')

<div class="mdk-header-layout__content page-content">

    <!-- Header Layout -->

    @include('layouts.template.administration.header')

    <!-- END Layout -->

    <!-- Menu Layout -->
    @include('layouts.template.administration.menu')
    <!-- END Menu Layout -->

    <!-- Section Pages Layout -->

    <!-- Section Dashboard Layout -->
    @include('template.administration.dashboard')
    <!-- END Section Dashboard Layout -->

    <div class="container card bg-white page__container page-section mt-5">

        <div class="card-header">
            <div class="row">
                <!-- Title -->
                <div class="col-sm-4">
                    <h3 class="content-header-title">Liste des certifications</h3>
                </div>

                <!-- Nombre d'éléments -->
                <div class="col-sm-4">
                    <h3 class="content-header-title">Nombre de certifications {{$certifications->count()}}</h3>
                </div>

                <!-- Bouton -->
                <div class="col-sm-4 text-right">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#addCertification">Nouvelle certification</a>
                </div>
            </div>
        </div>

        <!-- Wrapper -->
        <div class="table-responsive" data-toggle="lists" data-lists-values='["name"]'>

            <!-- Search -->
            <div class="search-form search-form--light mb-3 col-sm-4">
                <input type="text" class="form-control search" placeholder="Rechercher">
                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
            </div>

            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Titre</th>
                        <th>Éditeur</th>
                        <th>Niveau</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                @foreach($certifications as $certification)
                    <tr>
                        <td class="name">{{$certification->code}}</td>
                        <td class="name">{{$certification->titre}}</td>
                        <td class="name">{{$certification->editeur->nom}}</td>
                        <td class="name">{{$certification->niveau->nom}}</td>
                        <td class="name">
                            <div class="row">
                                <div class="col-2">
                                    <form method="POST" id="showForm" action="{{ route('admin.certifications.questions.search') }}">
                                        @csrf
                                        <input type="hidden" name="certification_id" value="{{$certification->id}}">
                                        <a href="#" onclick="submitShow()">
                                            <i class="fa fa-eye text-info mr-1" title="Mofification"></i>
                                        </a>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('admin.certifications.edit', $certification->id)}}">
                                        <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- END Section Pages Layout -->

    @include('layouts.template.footer')
</div>
@endsection

<!-- Modal -->
@section('modal')
    @include('template.administration.certifications.create')
@endsection
<!-- Modal -->

@section('script')
    <script>
        function submitShow()
        {
            $('#showForm').submit();
        }
    </script>
@endsection
