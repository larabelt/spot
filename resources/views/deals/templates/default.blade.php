@php
    $deal = $deal ?? $owner ?? new \Belt\Spot\Deal();
@endphp

<div class="deal">

    @foreach($deal->sections as $section)
        @include($section->template_view, ['section' => $section])
    @endforeach

</div>