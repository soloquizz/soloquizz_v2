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
            <form method="POST" action="{{ route('enseignant.evaluation.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Titre
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="titre" class="form-control" value="{{$evaluation->titre}}" required>
                                        <input type="hidden" name="cours_id" value="{{$evaluation->cours_id}}">
                                        </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="type">
                                            {{--@foreach($evaluation->type as $type)
                                            <option value="{{$evaluation->type}}" selected>value="{{$evaluation->type}}"</option>
                                            <option value="Devoir">Devoir</option>
                                            <option value="Examen">Examen</option>
                                            @endforeach--}}
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Note
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="note_max" required class="form-control" value="{{$evaluation->note_max}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="date" required class="form-control" value="{{$evaluation->date}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Heure
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="heure" required class="form-control" placeholder="12:00" value="{{$evaluation->getTime(heure)}}">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label">Durée (heure)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="duree" required class="form-control" value="{{$evaluation->duree}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection    
        