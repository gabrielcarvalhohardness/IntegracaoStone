<?php

declare (strict_types = 1);
namespace App;

use App\Request\CriarPedido;
use App\Request\FecharPedido;
use App\Request\ImprimirNotaFiscal;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class StoneClient {
    private Client $client;
    const BASE_URI = 'https://api.pagar.me';
    private string $apiKey;

    public function __construct(string $apiKey)
    {        
        $this->client = new Client([            
            RequestOptions::HEADERS => [
                'Accept'     => 'application/json',
                'Content-Type' => 'application/json'
            ],
            RequestOptions::AUTH => [$apiKey,''],
            RequestOptions::DEBUG => true
        ]);

        $this->apiKey = $apiKey;
    }

    public function criarPedido(CriarPedido $pedido) {

        $uri = 'orders';

        $body = (new Mapper)->mapCriarPedido($pedido);        
        $response = $this->enviarRequest('POST', $uri, [
            'json' => $body
        ]);
        
        return $response;
    }

    public function fecharPedido(FecharPedido $pedido) {
        $uri = "core/v5/orders/{$pedido->orderId}/closed";

        $body = (new Mapper)->mapFecharPedido($pedido);
        $response = $this->enviarRequest('PATCH', $uri, [
            'json' => $body
        ]);
        
        return $response;
    }

    public function imprimirNotaFiscal(ImprimirNotaFiscal $nota) {
        $uri = "posconnect/v1/orders/{$nota->orderId}/prints";

        $body = (new Mapper)->mapImprimirNota($nota);
        $response = $this->enviarRequest('POST', $uri, [
            'json' => $body
        ]);
        
        return $response;
    }


    private function enviarRequest($httpMethod, $uri, $options) {

        $uri = self::BASE_URI . '/' . $uri;

        try  {

            var_dump($httpMethod,$uri,$options);
            $response = $this->client->request($httpMethod, $uri, $options);
            return $response;
        }catch(Exception $exception) {
            throw $exception;
        }
    }
}