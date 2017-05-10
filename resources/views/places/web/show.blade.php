@extends('belt-core::layouts.web.main')

@section('meta-title', $place->meta_title)
@section('meta-description', $place->meta_description)
@section('meta-keywords', $place->meta_keywords)

@section('main')

    <div class="container">
        @include($place->template_view)
    </div>

@endsection