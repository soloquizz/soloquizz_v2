@extends('layouts.template.administration.master')

@section('title')
    Tableau de Bord
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

    <!-- END Section Pages Layout -->

    @include('layouts.template.footer')
</div>

@endsection

