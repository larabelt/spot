<li class="treeview">
    <a href="#">
        <i class="fa fa-globe"></i> <span>Spot Admin</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        @if(!$team)
            <li><a href="/admin/belt/spot/amenities"><i class="fa fa-plug"></i> <span>Amenities</span></a></li>
        @endif
        <li><a href="/admin/belt/spot/deals"><i class="fa fa-usd"></i> <span>Deals</span></a></li>
        <li><a href="/admin/belt/spot/events"><i class="fa fa-calendar"></i> <span>Events</span></a></li>
        <li><a href="/admin/belt/spot/itineraries"><i class="fa fa-map-marker"></i> <span>Itineraries</span></a></li>
        <li><a href="/admin/belt/spot/places"><i class="fa fa-building"></i> <span>Places</span></a></li>
    </ul>
</li>