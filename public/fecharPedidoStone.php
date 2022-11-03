<?php

use App\StoneClient;
use App\Request\FecharPedido;

require __DIR__ . "./../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$apiKey = $_ENV['ENVIRONMENT'] == 'development' ? $_ENV['API_KEY_DEVELOPMENT'] : $_ENV['API_KEY_PRODUCTION'];


$stoneClient = new StoneClient($apiKey);

## Fechar Pedido

$fecharPedido = new FecharPedido('or_aprkLK4iGFGr20EY','canceled');

$response = $stoneClient->fecharPedido($fecharPedido);

echo  "CONTENT " . PHP_EOL;
var_dump($response->getContent());
echo "Sucess:" . PHP_EOL;
var_dump($response->isSucess());
echo "StatusCode:" . PHP_EOL;
var_dump($response->getStatusCode());
echo "API KEY:" . PHP_EOL;
echo $apiKey;


