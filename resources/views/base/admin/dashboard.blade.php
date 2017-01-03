@extends('ohio-core::layouts.admin.main')

@section('scripts-body-close')
    @parent
    <script src="/js/ohio-spot.js"></script>
@endsection

@section('main')

    <div id="ohio-spot">
        <router-view></router-view>
    </div>

@stop