<?php

namespace Tests\Unit;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
/**/
class SerieTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
  
   
  
    public function test_series_list_request_works()
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

    public function test_edit_series_returns_right_status(){
        $data = [
            'nome' => 'nome-serie-criada', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        
        $data = ['nome' => 'serie'];
        $response = $this->json('PATCH', '/api/v1/serie/1', $data);
        $response->assertStatus(204);
    }

    public function test_edit_series_returns_right_content(){
        $data = [
            'nome' => 'nome-serie-criada', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        
        $data = ['nome' => 'serie'];
        $this->json('PATCH', '/api/v1/serie/1', $data);
        $response = $this->json('get', '/api/v1/serie/1', $data);
        $responseData = $response->getOriginalContent();
        $this->assertEquals($data['nome'],$responseData['nome']);
    }

    public function test_change_status_returns_right_status(){
        $data = [
            'nome' => 'serie', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        $response = $this->json('PUT', '/api/v1/serie/1/status', $data);
        $response->assertStatus(204);
    }

    public function test_change_status_returns_right_content(){
        $data = [
            'nome' => 'serie', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        $this->json('put', '/api/v1/serie/1/status', $data);
        $response = $this->json('get', '/api/v1/serie/1', $data);
        $responseData = $response->getOriginalContent();
        $this->assertEquals('nao-assistido',$responseData['status']);
        
    }

    public function test_serie_gets_deleted_status_assert(){
        
        $data = [
            'nome' => 'nome-serie-criada', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        $this->json('get', '/api/v1/serie/1', $data);
        $response = $this->json('delete', '/api/v1/serie/1', $data);
        $response->assertStatus(200);
    }

    public function test_serie_gets_deleted_noContent_assert(){
        
        $data = [
            'nome' => 'nome-serie-criada', 
            'status' => 'assistido'
        ];
        $this->json('POST', '/api/v1/serie', $data);
        $response = $this->json('get', '/api/v1/serie/1', $data);
        $this->json('delete', '/api/v1/serie/1', $data);
        $responseData = $response->getOriginalContent();
        $this->assertEquals(0,$responseData->count());
    }


}
