<?php

use App\StoneClient;
use App\Models\Customer;
use App\Models\Item;
use App\Models\PaymentSetting;
use App\Models\PaymentSetup;
use App\Request\CriarPedido;

require __DIR__ . "./../vendor/autoload.php";

$apiKey = $argv[1];

if(empty($apiKey)) exit;


$stoneClient = new StoneClient($apiKey);

$customer = new Customer('Gabriel');
$paymentSetup = new PaymentSetup('credit',2,'merchant');
$paymentSetting = new PaymentSetting(true,['a98765-4321'], 'Caixa 01',$paymentSetup);
$pedido = new CriarPedido($paymentSetting,false, $customer);
$pedido->addItem(new Item(13.12,'Chaveiro',1,'01234a'));        


## Criar Pedido ##
$response = $stoneClient->criarPedido($pedido);


## Resultado
echo  "CONTENT " . PHP_EOL;
var_dump($response->getContent());
echo "Sucess:" . PHP_EOL;
var_dump($response->isSucess());
echo "StatusCode:" . PHP_EOL;
var_dump($response->getStatusCode());
