@php
    $can['amenities'] = Auth::user()->can('edit', Belt\Spot\Amenity::class);
    $can['deals'] = Auth::user()->can('edit', Belt\Spot\Deal::class);
    $can['events'] = Auth::user()->can('edit', Belt\Spot\Event::class);
    $can['itineraries'] = Auth::user()->can('edit', Belt\Spot\Itinerary::class);
    $can['places'] = Auth::user()->can('edit', Belt\Spot\Place::class);
@endphp

@if($can['amenities'] || $can['deals'] || $can['events'] || $can['itineraries'] || $can['places'])
    <li class="treeview">
        <a href="#">
            <i class="fa fa-globe"></i> <span>Spot Admin</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            @if($can['amenities'])
                <li><a href="/admin/belt/spot/amenities"><i class="fa fa-plug"></i> <span>Amenities</span></a></li>
            @endif
            @if($can['deals'])
                <li><a href="/admin/belt/spot/deals"><i class="fa fa-usd"></i> <span>Deals</span></a></li>
            @endif
            @if($can['events'])
                <li><a href="/admin/belt/spot/events"><i class="fa fa-calendar"></i> <span>Events</span></a></li>
            @endif
            @if($can['itineraries'])
                <li><a href="/admin/belt/spot/itineraries"><i class="fa fa-map-marker"></i> <span>Itineraries</span></a></li>
            @endif
            @if($can['places'])
                <li><a href="/admin/belt/spot/places"><i class="fa fa-building"></i> <span>Places</span></a></li>
            @endif
        </ul>
    </li>
@endif