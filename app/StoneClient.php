<?php

declare (strict_types = 1);
namespace App;

use App\Request\CriarPedido;
use Exception;
use GuzzleHttp\Client;

class StoneClient {
    private Client $client;
    const BASE_URI = 'https://api.pagar.me';
    public function __construct(string $apiKey)
    {        
        $this->client = new Client([            
            'base_uri' => self::BASE_URI,            
            'headers' => [                
                'Accept'     => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function criarPedido(CriarPedido $pedido) {

        $uri = 'core/v5/orders/';

        $body = (new Mapper)->mapPedido($pedido);

        $response = $this->enviarRequest('POST', $uri, $body);
        
        return $response;
    }


    private function enviarRequest($httpMethod, $uri, $options) {

        $uri = self::BASE_URI . '/' . $uri;

        try  {

            var_dump($httpMethod,$uri,$options);
            // $response = $this->client->request($httpMethod, $uri, $options);
            // return $response;
        }catch(Exception $exception) {
            throw $exception;
        }
    }
}