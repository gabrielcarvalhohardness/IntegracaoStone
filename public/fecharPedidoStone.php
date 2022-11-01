<?php

use App\StoneClient;
use App\Request\FecharPedido;

require __DIR__ . "./../vendor/autoload.php";

$apiKey = $argv[1];

if(empty($apiKey)) exit;


$stoneClient = new StoneClient($apiKey);

## Fechar Pedido

$fecharPedido = new FecharPedido('cus_mBloKMLnswtD4O3a','canceled');

$response = $stoneClient->fecharPedido($fecharPedido);

echo  "CONTENT " . PHP_EOL;
var_dump($response->getContent());
echo "Sucess:" . PHP_EOL;
var_dump($response->isSucess());
echo "StatusCode:" . PHP_EOL;
var_dump($response->getStatusCode());
echo "API KEY:" . PHP_EOL;
echo $apiKey;


