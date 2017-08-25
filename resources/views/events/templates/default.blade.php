@php
    $event = $event ?? $owner ?? new \Belt\Spot\Event();
@endphp

<div class="event">

    <h1>{{ $event->name }}</h1>

    @if($event->param('show_datetime', true))
        <p>Starts: {{ $event->starts_at->format('l, F jS @ g:i a') }}</p>
        <p>Ends: {{ $event->ends_at->format('l, F jS @ g:i a') }}</p>
    @endif

    @foreach($event->sections as $section)
        @include($section->template_view, ['section' => $section])
    @endforeach

</div>