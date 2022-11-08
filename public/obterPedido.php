<?php

use App\StoneClient;
use App\Models\Customer;
use App\Models\Item;
use App\Models\PaymentSetting;
use App\Models\PaymentSetup;
use App\Request\CriarPedido;

require __DIR__ . "./../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$apiKey = $_ENV['ENVIRONMENT'] == 'development' ? $_ENV['API_KEY_DEVELOPMENT'] : $_ENV['API_KEY_PRODUCTION'];

$stoneClient = new StoneClient($apiKey);

## Obter pedido (Rota de resiliência)
$response = $stoneClient->obterPedido('or_0KmVYBZhAhNY6wxv');


## Resultado
echo  "CONTENT " . PHP_EOL;
var_dump($response->getContent());
echo "Sucess:" . PHP_EOL;
var_dump($response->isSucess());
echo "StatusCode:" . PHP_EOL;
var_dump($response->getStatusCode());
