
@extends('layouts.template.enseignant.master')
@section('css')
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/quill.rtl.css')}}" rel="stylesheet">
@endsection
@section('content_page')

    <div class="mdk-header-layout__content page-content">

        <!-- Header Layout -->

        @include('layouts.template.enseignant.header')

        <!-- END Layout -->

        <!-- Menu Layout -->
        @include('layouts.template.enseignant.menu')
        <!-- END Menu Layout -->

        <!-- Section Pages Layout -->

        <!-- END Section Dashboard Layout -->
        <div class="row justify-content-center mt-5">
            @include('adminlte-templates::common.errors')
        </div>
        <div class="container card bg-white page__container page-section mt-10">
            <form action="{{route('enseignant.questionCours.update', $questionCours->id)}}" method = "POST" id="storeQuestionForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--recup id cours-->
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label">QCM
                                        <span class="text-danger">*</span>

                                    </label>
                                    <select class="form-control form-control-sm" aria-label=".form-select-sm example" name="qcm">
                                        @if($questionCours->qcm == 1)
                                        <option value="1" selected>OUI</option>
                                        <option value="0">NON</option>
                                    @else
                                        <option value="1">OUI</option>
                                        <option value="0" selected>NON</option>
                                    @endif
                                      </select>
                                 </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <input type="hidden" name="cours_id" value="{{$questionCours->cours->id}}">
                                    <textarea name="contenu" style="display:none" id="hiddenAreaQuestion"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Contenu
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div id="editor" style="height: 500px; overflow-y:auto;margin-top:3em">
                                        {!! $questionCours->contenu !!}

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
        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
    @endsection

    @section('script')
        <!-- Quill -->
        <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
        <script src="{{asset('assets/vendor/image-resize.min.js')}}"></script>
        <script src="{{asset('assets/js/quill.js')}}"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    imageResize: {
                        displaySize: true
                    },
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'align': [] }],
                        ['link', 'image'],
                        [{"list": "ordered"}, {"list": "bullet"}],
                        ['clean']
                    ]
                }
            });
    
            $("#storeQuestionForm").on("submit",function() {
                $("#hiddenAreaQuestion").val($("#editor").html());
            });
    
        </script>
    
    @endsection
    






       {{-- <div class="container card bg-white page__container page-section mt-5">
            {!! Form::model($questionCours, ['route' => ['admin.questions.update', $questionCours->id], 'method' => 'patch', 'id'=>'storeQuestionForm']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label">QCM
                                    <span class="text-danger">*</span>

                                </label>
                                <select class="form-control form-control-sm" aria-label=".form-select-sm example" name="qcm">
                                    <option value="1">1</option>
                                    <option value="0">Non</option>
                                  </select>
                             </div>
                            <div class="col-12 col-md-6 mb-3">
                                <input type="hidden" name="cours_id" value="{{$cours->id}}">
                                <textarea name="contenu" style="display:none" id="hiddenAreaQuestion"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-12 mb-3">
                                <label class="form-label">Contenu
                                    <span class="text-danger">*</span>
                                </label>
                                <div id="editorQuestion" style="height: 500px; overflow-y:auto;margin-top:3em">
                                    {!! $questionCours->contenu !!}
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">Enregistrer</button>
            </div>
            {!! Form::close() !!}
        </div>

        <!-- END Section Pages Layout -->

        @include('layouts.template.footer')
    </div>
@endsection

@section('script')
    <!-- Quill -->
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/image-resize.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    ['link', 'image'],
                    [{"list": "ordered"}, {"list": "bullet"}],
                    ['clean']
                ]
            }
        });

        $("#storeQuestionForm").on("submit",function() {
            $("#hiddenArea").val($("#editor").html());
        });

    </script>

@endsection

--}}
