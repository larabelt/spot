<?php
namespace Ohio\Spot\Base\Services\GeoCoders;

use Ohio\Spot\Address\Address;

class GoogleMapsGeoCoder extends BaseGeoCoder
{

    public function geocode($address)
    {
        $this->address = new Address();
        $this->result = [];

        $url = implode('?', [
            'http://maps.googleapis.com/maps/api/geocode/json',
            http_build_query([
                'sensor' => 'false',
                'address' => $address,
            ])
        ]);

        try {
            $response = $this->guzzle()->get($url);
            $contents = json_decode($response->getBody()->getContents(), true);
            $this->result = array_get($contents, 'results.0');
        } catch (\Exception $e) {

        }

        # lines
        $streetNumber = $this->component('street_number');
        $route = $this->component('route');
        $line1 = $streetNumber && $route ? "$streetNumber $route" : null;
        $this->address->line1 = $line1;
        $this->address->line2 = $this->component('subpremise', 'long_name');

        # city, state, country & post code
        $locality = $this->component('locality', 'long_name');
        $locality = $locality ?: $this->component('sublocality', 'long_name');
        $locality = $locality ?: $this->component('neighborhood', 'long_name');
        $this->address->locality = $locality;
        $this->address->region = $this->component('administrative_area_level_1');
        $this->address->postcode = $this->component('postal_code');
        $this->address->country = $this->component('country');

        # lat & lng
        $this->address->lat = array_get($this->result, 'geometry.location.lat');
        $this->address->north_lat = array_get($this->result, 'geometry.viewport.northeast.lat');
        $this->address->south_lat = array_get($this->result, 'geometry.viewport.southwest.lat');
        $this->address->lng = array_get($this->result, 'geometry.location.lng');
        $this->address->east_lng = array_get($this->result, 'geometry.viewport.northeast.lng');
        $this->address->west_lng = array_get($this->result, 'geometry.viewport.southwest.lng');

        # misc
        $this->address->formatted = array_get($this->result, 'formatted_address');
        $this->address->original = $address;
        $this->address->geo_service = 'GoogleMaps';
        $this->address->geo_code = array_get($this->result, 'place_id');
    }

    public function component($type, $field = 'short_name')
    {
        $components = array_get($this->result, 'address_components', []);

        foreach ($components as $component) {
            if (array_get($component, 'types.0') == $type) {
                return $component[$field];
            }
        }

        return '';
    }

}