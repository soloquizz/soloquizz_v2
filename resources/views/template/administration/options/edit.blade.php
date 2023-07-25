@extends('layouts.template.administration.master')

@section('css')
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

        <!-- Section Dashboard Layout -->
        @include('template.administration.dashboard')
        <!-- END Section Dashboard Layout -->

        <div class="row justify-content-center mt-5">
            @include('adminlte-templates::common.errors')
        </div>

        <div class="container card bg-white page__container page-section mt-5">
            {!! Form::model($option, ['route' => ['admin.options.update', $option->id], 'method' => 'patch', 'id'=>'storeOptionForm']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label">Correcte
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" name="correcte">
                                    @if($option->correcte == 1)
                                        <option value="1" selected>OUI</option>
                                        <option value="0">NON</option>
                                    @else
                                        <option value="1">OUI</option>
                                        <option value="0" selected>NON</option>
                                    @endif
                                </select>
                                <textarea name="contenu" style="display:none" id="hiddenAreaOption"></textarea>
                                <input type="hidden" name="page" value="{{$page}}">
                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                <input type="hidden" name="certification_id" value="{{$certification->id}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-12 mb-3">
                                <label class="form-label">Contenu
                                    <span class="text-danger">*</span>
                                </label>
                                <div id="editorOption" style="height: 500px; overflow-y:auto;margin-top:3em">
                                    {!! $option->contenu !!}
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
        var quill = new Quill('#editorOption', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'color': []}, {'background': []}],
                    [{'align': []}],
                    ['link', 'image'],
                    [{"list": "ordered"}, {"list": "bullet"}],
                    ['clean']
                ]
            }
        });

        $("#storeOptionForm").on("submit", function () {
            $("#hiddenAreaOption").val($("#editorOption").html());
        });

    </script>

@endsection


