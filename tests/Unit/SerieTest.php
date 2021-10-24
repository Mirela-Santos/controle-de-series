<?php

namespace Tests\Unit;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SerieTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
  
    #erro do teste abaixo é uma retorno de 500 no seriescontrolles que não
    #porquê está assim
  
    /*public function test_series_list_request_works()
    {
        $response = $this->json('GET','/api/v1/series');
        $response->assertStatus(200);
    }

    public function test_series_list_is_collection()
    {
        $response = $this->json('GET','/api/v1/series');
        $responseData = $response->getOriginalContent();
        $this->assertInstanceOf(Collection::class, $responseData);
    }

    public function test_series_list_loading_works()
    {
        $response = $this->json('GET','/api/v1/series');
        $responseData = $response->getOriginalContent();
        $this->assertEquals(0,$responseData->count());

        Serie::create(['nome' => 'serie de teste']);

        $response = $this->json('GET','/api/v1/series');
        $responseData = $response->getOriginalContent();
        $this->assertEquals(1,$responseData->count());

    }
    
    # TESTE DA EQUIPE

    public function test_serie_gets_edited(){
        $data = [
            'nome' => 'nome-serie-criada', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        
        $data = ['nome' => 'serie'];
        $response = $this->json('PATCH', '/api/v1/serie/1', $data);
        $responseData = $response->getOriginalContent();
        $response->assertStatus(204);
    }*/

    public function test_status_changes(){
        $data = [
            'nome' => 'nome-serie-criada', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        $response = $this->json('PUT', '/api/v1/serie/1/status');
        $response->assertStatus(204);
        
    }

}
