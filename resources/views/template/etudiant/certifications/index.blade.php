@extends('layouts.template.etudiant.master')

@section('title')
    Liste des certifications
@endsection

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.etudiant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.etudiant.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <div class="container page__container page-section">
            @foreach($editeurs as $editeur)
           
                <a href="#" class="mb-heading d-flex align-items-center text-body">
                    <span class="mr-16pt">
                        <img src="{{$editeur->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                    </span>
                    <span class="d-flex flex-column flex">
                        <span class="h4 d-block m-0">{{$editeur->nom}}</span>
                        <span class="text-70">{{$editeur->certifications->count()}} certifications</span>
                    </span>
                </a>
                <div class="card stack">
                    <div class="list-group list-group-flush">
                        
                        @foreach($editeur->certifications as $certification)
                        @if($certification->statut==1)
                            <div class="list-group-item d-flex align-items-center px-16pt">
                                <div class="flex d-flex flex-column">
                                    <a class="text-body"
                                       href="{{route('etudiant.dumps',$certification->id)}}">{{$certification->titre}}</a>
                                    <small class="text-muted text-danger">10% de réussite</small>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <span class="lead lh-1">{{$certification->questions->count()}}</span>
                                    <small class="text-muted text-uppercase">Questions</small>
                                </div>
                                <a href="{{route('etudiant.dumps',$certification->id)}}" class="text-muted ml-8pt">
                                    <i class="material-icons">chevron_right</i></a>
                            </div>
                        @else
                        <div class="list-group-item d-flex align-items-center px-16pt">
                            <div class="flex d-flex flex-column">
                                <a class="text-body"
                                   href="{{route('etudiant.dumps',$certification->id)}}">{{$certification->titre}}</a>
                                <small class="text-muted text-danger">10% de réussite</small>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <span class="lead lh-1 text-danger">Non disponilble</span>
                            </div>
                        </div>
                            
                        @endif
                        
                       
                        @endforeach
                    </div>
                </div>
                <br>
            @endforeach

            <!-- Pagination -->
            <ul class="pagination justify-content-center pagination-sm">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true" class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#" aria-label="1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="1">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true" class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection
