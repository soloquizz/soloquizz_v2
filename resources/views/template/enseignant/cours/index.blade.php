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

        <div class="container page__container">
            <div class="page-section">

                <div class="page-heading">
                    <h3 class="mr-24pt mb-md-0 d-md-inline-block">Mes cours</h3>
                    <div class="col-md text-center text-md-right d-flex justify-content-md-end align-items-center flex-wrap" style="white-space: nowrap;">
                        @foreach($classes as $classe)
                            @if($loop->index == 0)
                                <a href="#" id="claaseHead{{$classe->id}}" title="{{$classe->nom}}" class="allClassehead chip active mb-16pt mb-md-0 chip-outline-secondary" onclick="loadCourse({{$classe->id}})">{{ mb_strimwidth($classe->nom, 0, 25, "...")}}</a>
                            @else
                                <a href="#" id="claaseHead{{$classe->id}}" title="{{$classe->nom}}" class="allClassehead chip  mb-16pt mb-md-0 chip-outline-secondary" onclick="loadCourse({{$classe->id}})">{{ mb_strimwidth($classe->nom, 0, 25, "...")}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mb-lg-8pt mt-3">
                    <div class="position-relative carousel-card">
                        @foreach($classes as $classe)
                            <div class="row allClasseBody {{$loop->index == 0 ? 'firstClasse' : ''}}" id="classeBody{{$classe->id}}">
                                @foreach($cours as $cour)
                                    @if($classe->id == $cour->classe_id)
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body d-flex justify-content-center">
                                                    <a href="{{route('enseignant.cours.show',$cour->id)}}">
                                                        <img src="{{$cour->image()}}" class="img-fluid" style="height: 150px!important; width: 200px!important; align-content: center!important;">
                                                    </a>
                                                </div>
                                                <div class="card-footer justify-content-center text-center">
                                                    <a class="text-center" href="{{route('enseignant.cours.show',$cour->id)}}">{{$cour->nom}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

@section('script')
    <script>
        $('document').ready(
            function() {
                $('.allClasseBody').hide();
                $('.firstClasse').show();
            }
        );
        function loadCourse(classe_id)
        {
            $('.allClasseBody').hide();
            $('.allClassehead').removeClass('active');
            $('#classeBody'+classe_id).show();
            $('#claaseHead'+classe_id).addClass('active');
        }
    </script>
@endsection

