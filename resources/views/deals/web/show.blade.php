@extends('belt-core::layouts.web.main')

@section('meta-title', $deal->meta_title)
@section('meta-description', $deal->meta_description)
@section('meta-keywords', $deal->meta_keywords)

@section('main')

    <div class="container">
        @include($deal->subtype_view)
    </div>

@endsection