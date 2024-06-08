@extends('layouts.template.etudiant.master')

@section('title')
    Liste des evaluations
@endsection

@section('css')
<style>
    .lead{
        color: red;
    }
</style>
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
           
            @foreach($courss as $cours)
            @if($cours->evaluations->count()>0)
            <a href="#" class="mb-heading d-flex align-items-center text-body">
                <span class="mr-16pt">
                    <img src="{{$cours->image()}}" width="40" alt="Angular Fundamentals" class="rounded">
                </span>
                <span class="d-flex flex-column flex">
                    <span class="h4 d-block m-0">{{$cours->nom}}</span>
                    <span class="text-70">{{$cours->evaluations->count()}} evaluations</span>
                </span>
            </a>
                <div class="card stack">
                    <div class="list-group list-group-flush">
                        
                        @foreach($cours->evaluations?->sortByDesc('date') as $evaluation)
                        
                           <?php $data_diff=$date->diffInDays($evaluation->date, false) ?> 
                          
                            <div class="list-group-item d-flex align-items-center px-16pt">
                                <div class="flex d-flex flex-column">
                                   <span>{{$evaluation->titre}}</span>
                                  
                                   @if($data_diff < 0)
                                    <small class="text-danger">{{$evaluation->date->format('d-m-Y')}}</small>
                                   @else
                                    <small class="text-info">{{$evaluation->date->format('d-m-Y')}}</small>
                                   @endif
                                  
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <small class="text-muted text-uppercase">{{$evaluation->type}}</small>
                                </div>
                                
                                <a href="#" class="text-muted ml-8pt">
                                    <i class="material-icons">chevron_right</i></a>
                         
                            </div>
                            
                        @endforeach
                       
                       
                    </div>
                </div>
                <br>
            @endif
            @endforeach
            <!-- Pagination -->
            <ul class="pagination justify-content-center pagination-sm">
               {{$courss->links()}}
            </ul>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection
