<?php namespace Tests\Belt\Spot\Feature\Api;

use Tests\Belt\Core;

class ApiAmenitySpotsTest extends \Tests\Belt\Core\BeltTestCase
{

    public function test()
    {
        $this->refreshDB();
        $this->actAsSuper();

        # index
        $response = $this->json('GET', '/api/v1/places/1/amenities');
        $response->assertStatus(200);

        # store
        $response = $this->json('POST', '/api/v1/places/1/amenities', [
            'id' => 1,
            'value' => 'foo',
        ]);
        $response->assertStatus(201);
        $response->assertJsonFragment(['id' => 1]);
        $response = $this->json('GET', '/api/v1/places/1/amenities/1');
        $response->assertStatus(200);

        # store (again)
        $response = $this->json('POST', '/api/v1/places/1/amenities', [
            'id' => 1,
            'value' => 'bar',
        ]);
        $response->assertStatus(201);

        # update
        $this->json('PUT', '/api/v1/places/1/amenities/1', ['value' => 'updated']);

        # show
        $response = $this->json('GET', "/api/v1/places/1/amenities/1");
        $response->assertStatus(200);
        $response->assertJson(['pivot' => ['value' => 'updated']]);

        # detach
        $response = $this->json('DELETE', "/api/v1/places/1/amenities/1");
        $response->assertStatus(204);
        $response = $this->json('GET', "/api/v1/places/1/amenities/1");
        $response->assertStatus(404);

        # delete object with empty value
        $amenity = \Belt\Spot\Amenity::where('subtype', 'text')->first();
        $this->json('POST', '/api/v1/places/1/amenities', ['id' => $amenity->id, 'value' => 'not-empty']);
        $response = $this->json('GET', "/api/v1/places/1/amenities/$amenity->id");
        $response->assertStatus(200);
        $response->assertJson(['pivot' => ['value' => 'not-empty']]);
        $this->json('PUT', "/api/v1/places/1/amenities/$amenity->id", ['value' => '']);
        $response = $this->json('GET', "/api/v1/places/1/amenities/$amenity->id");
        $response->assertStatus(404);
    }

}