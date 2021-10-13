<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
use Tests\TestCase;

class SerieTest extends TestCase
{
<<<<<<< HEAD
=======
    use RefreshDatabase;
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
    /**
     * A basic unit test example.
     *
     * @return void
     */
<<<<<<< HEAD
    public function test_request_works()
    {
        $response = $this->json('GET', '/api/v1/series');
        $response -> assertStatus(200);
    }

    public function test_series_list_is_collection(){
        $response = $this->json('GET', '/api/v1/series');
=======
    public function test_series_list_request_works()
    {
        $response = $this->json('GET','/api/v1/series');
        $response->assertStatus(500);
    }

    public function test_series_list_is_collection()
    {
        $response = $this->json('GET','/api/v1/series');
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
        $responseData = $response->getOriginalContent();
        $this->assertInstanceOf(Collection::class, $responseData);
    }

<<<<<<< HEAD
    public function test_series_list_loading_works(){
        $response = $this->json('GET', '/api/v1/series');
        $responseData = $response->getOriginalContent();
        $this->assertEquals(0,$responseData->count());

        Serie::create([
            'nome' => 'serie de teste'
        ]);

        $response = $this->json('GET', '/api/v1/series');
=======
    public function test_series_list_loading_works()
    {
        $response = $this->json('GET','/api/v1/series');
        $responseData = $response->getOriginalContent();
        $this->assertEquals(0,$responseData->count());

        Serie::create(['nome' => 'serie de teste']);

        $response = $this->json('GET','/api/v1/series');
>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
        $responseData = $response->getOriginalContent();
        $this->assertEquals(1,$responseData->count());

    }
<<<<<<< HEAD
=======

>>>>>>> 1350c2f642558e530213ca098806dc04583bbe9c
}
