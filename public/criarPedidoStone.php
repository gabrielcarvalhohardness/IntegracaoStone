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

$customer = new Customer('Hardness','suporte@hardness.com.br');
$paymentSetup = new PaymentSetup('credit',1,'merchant');
$paymentSetting = new PaymentSetting(true,['6G297588'], 'Carrinho A',$paymentSetup);
$pedido = new CriarPedido($customer,$paymentSetting);
$pedido->addItem(new Item(0.10,'HD 500',1,'3265A'));        


## Criar Pedido ##
$response = $stoneClient->criarPedido($pedido);


## Resultado
echo  "CONTENT " . PHP_EOL;
var_dump($response->getContent());
echo "Sucess:" . PHP_EOL;
var_dump($response->isSucess());
echo "StatusCode:" . PHP_EOL;
var_dump($response->getStatusCode());
