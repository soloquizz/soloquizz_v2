@extends('layouts.template.enseignant.master')

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.enseignant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.enseignant.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <div class="container page__container page-section">
        
        
         <div class="page-heading">
            <h3 class="mr-24pt mb-md-0 d-md-inline-block">Mes evaluations</h3>
            <div class="col-md text-center text-md-right d-flex justify-content-md-end align-items-center flex-wrap"
                 style="white-space: nowrap;">
                 @foreach($classes as $classe)
                    @if($loop->index == 0)
                        <a href="#" id="claaseHead{{$classe->id}}" title="{{$classe->nom}}"
                           class="allClassehead chip active mb-16pt mb-md-0 chip-outline-secondary"
                           onclick="loadCourse({{$classe->id}})">{{ mb_strimwidth($classe->nom, 0, 25, "...")}}</a>
                    @else
                        <a href="#" id="claaseHead{{$classe->id}}" title="{{$classe->nom}}"
                           class="allClassehead chip  mb-16pt mb-md-0 chip-outline-secondary"
                           onclick="loadCourse({{$classe->id}})">{{ mb_strimwidth($classe->nom, 0, 25, "...")}}</a>
                    @endif
                 @endforeach
            </div>
        </div>
        @foreach($classes as $classe)
        <div class="allClasseBody {{$loop->index == 0 ? 'firstClasse' : ''}}"
            id="classeBody{{$classe->id}}">
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
        </div>
        
            @endforeach
            <!-- Pagination -->
            <div class="card-footer">
                <nav aria-label="Page navigation example">
               {{$courss?->links()}}
                </nav>
            </div>
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

@section('script')
    <script>
        $('document').ready(
            function () {
                $('.allClasseBody').hide();
                $('.firstClasse').show();
            }
        );

        function loadCourse(classe_id) {
            $('.allClasseBody').hide();
            $('.allClassehead').removeClass('active');
            $('#classeBody' + classe_id).show();
            $('#claaseHead' + classe_id).addClass('active');
        }
    </script>
@endsection
