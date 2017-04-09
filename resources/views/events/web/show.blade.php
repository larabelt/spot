@extends('belt-core::layouts.web.main')

@section('meta-title', $event->meta_title)
@section('meta-description', $event->meta_description)
@section('meta-keywords', $event->meta_keywords)

@section('main')

    <div class="container">
        {!! $compiled !!}
    </div>

@endsection