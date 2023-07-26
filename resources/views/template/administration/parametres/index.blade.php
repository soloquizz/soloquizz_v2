@extends('layouts.template.administration.master')

@section('css')

    <!--Datatables-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/quill.rtl.css')}}" rel="stylesheet">
@endsection

@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.administration.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.administration.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <div class="row mt-3 justify-content-center">
            @include('adminlte-templates::common.errors')

        </div>

        <div class="container page__container">
            <div class="page-section">
               
                <div class="container card bg-white page__container page-section">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" href="#domaines" onclick="switchTabDomaines()" data-toggle="tab">Domaines</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#parcours" onclick="switchTabParcours()" data-toggle="tab">Parcours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#niveaux" onclick="switchTabNiveaux()" data-toggle="tab">Niveaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#annee" onclick="switchTabAnnee()" data-toggle="tab">Années Scolaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#semestre" onclick="switchTabSemestre()" data-toggle="tab">Semestres</a>
                        </li>
                       

                        <div class="fa-pull-right mb-3">

                            <a href="#" class="btnTab btn btn-outline-primary" id="btnDomaine"
                               style="margin-left: 225%!important; width: 170px!important;" data-toggle="modal"
                               data-target="#addDomaine">Nouveau domaine</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3" id="btnParcours"
                               style="margin-left: 215%!important; width: 180px!important;" data-toggle="modal"
                               data-target="#addParcour">Nouveau parcours</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3" id="btnNiveau"
                               style="margin-left: 215%!important; width: 180px!important;" data-toggle="modal"
                               data-target="#addNiveau">Nouveau niveau</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3" id="btnAnnee"
                               style="margin-left: 215%!important; width: 180px!important;" data-toggle="modal"
                               data-target="#addAnneeScolaire" id="btnAnnee">Nouvelle Année</a>
                            <a href="#" class="btnTab btn btn-outline-primary mb-3" id="btnSemestre"
                               style="margin-left: 215%!important; width: 180px!important;" data-toggle="modal"
                               data-target="#addSemestre">Nouveau semestre</a>


                        </div>
                    </ul>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="domaines">
                            <div class="row">                       
                                <table class="table" id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>Nom du domaine</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody class="list">
                                            @foreach($domain as $domaine)
                                                <tr>
                                                    <td class="name">{{$domaine->nom}}</td>
                                                    <td class="name">
                                                        <a href="{{route('admin.domaines.edit', $domaine->id)}}">
                                                        <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>                                                            
                                                            
                            </div>
                        </div>
                        <!--Parcours space-->
                        <div class="tab-pane" id="parcours">
                            <div class="row">
                                <table class="table" id="myTable2">
                                    <thead>
                                    <tr>
                                        <th>Nom du parcour</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($parcours as $parcour)
                                        <tr>
                                            <td class="name">{{$parcour->nom}}</td>
                                            <td class="name">
                                                <a href="{{route('admin.parcours.edit', $parcour->id)}}">
                                                    <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--ESPACE NIVEAUX-->
                        <div class="tab-pane" id="niveaux">
                            <table class="table" id="myTable3">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Nombre d'année</th>
                                    <th>Parcours</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($niveaux as $niveau)
                                    <tr>
                                        <td class="name">{{$niveau->nom}}</td>
                                        <td class="name">{{$niveau->annee}}</td>
                                        <td class="name">{{$niveau->parcour->nom}}</td>
                                        <td class="name">
                                            <a href="{{route('admin.niveaux.edit', $niveau->id)}}">
                                                <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!--ESPACE Annee-->
                        <div class="tab-pane" id="annee">
                                <table class="table" id="myTable4">
                                    <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Année</th>
                                        <th>État</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($annees as $anneeScolaire)
                                        <tr>
                                            <td class="name">{{$anneeScolaire->code}}</td>
                                            <td class="name">{{$anneeScolaire->annee}}</td>
                                            <td class="name">
                                                @if($anneeScolaire->actif)
                                                    <span class="text-white bg-success">Actif</span>
                                                @else
                                                    <span class="text-white bg-danger">Inactif</span>
                                                @endif
                                            </td>
                                            <td class="name">
                                                <a href="{{route('admin.anneeScolaires.edit', $anneeScolaire->id)}}">
                                                    <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--ESPACE SEMESTRE-->
                            <div class="tab-pane" id="semestre">
                            <table class="table" id="myTable5">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Numéro</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($semestres as $semestre)
                                    <tr>
                                        <td class="name">{{$semestre->nom}}</td>
                                        <td class="name">{{$semestre->numero}}</td>
                                        <td class="name">
                                            <a href="{{route('admin.semestres.edit', $semestre->id)}}">
                                                <i class="fa fa-edit text-warning mr-1" title="Mofification"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>

@endsection

@section('modal')
    @include('template.administration.domaines.create')
    @include('template.administration.parcours.create')
    @include('template.administration.niveaux.create')
    @include('template.administration.annee_scolaires.create')
    @include('template.administration.semestres.create')
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/image-resize.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script>
        //switch selon les boutons appuyés
        $('document').ready(function () {
            $('.btnTab').hide();
            switchTabDomaines();
        })

        function switchTabDomaines() {
            $('.btnTab').hide();
            $('#btnDomaine').show();
        }

        function switchTabParcours() {
            $('.btnTab').hide();
            $('#btnParcours').show();
        }

        function switchTabNiveaux() {
            $('.btnTab').hide();
            $('#btnNiveau').show();
        }
        function switchTabAnnee() {
            $('.btnTab').hide();
            $('#btnAnnee').show();

        }
        function switchTabSemestre() {
            $('.btnTab').hide();
            $('#btnSemestre').show();
        }
    
         
         $(document).ready(function(){
           $('#myTable1').DataTable();
           $('#myTable2').DataTable();
           $('#myTable3').DataTable();
           $('#myTable4').DataTable();
           $('#myTable5').DataTable();

         })
         

       
    </script>
@endsection

