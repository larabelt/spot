@php
    $event = $event ?? $owner ?? new \Belt\Spot\Event();
@endphp

<div class="event">

    @foreach($event->sections as $section)
        @include($section->template_view, ['section' => $section])
    @endforeach

</div>