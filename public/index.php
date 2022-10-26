<?php

use App\Models\Customer;
use App\Models\Item;
use App\Models\PaymentSetting;
use App\Models\PaymentSetup;
use App\Request\CriarPedido;
use App\Request\FecharPedido;
use App\Request\ImprimirNotaFiscal;
use App\StoneClient;

require __DIR__ . "./../vendor/autoload.php";


$stoneClient = new StoneClient('THIS_IS_MY_API_KEY');

$customer = new Customer('Gabriel','gabriel@hardness.com.br');
$paymentSetup = new PaymentSetup('credit',2,'merchant');
$paymentSetting = new PaymentSetting(true,['d6as4da6s5', '65sad4621'], 'Pedido 10',$paymentSetup);
$pedido = new CriarPedido($customer, false,$paymentSetting);
$pedido->addItem(new Item(1990,'Chaveiro',12,'kldjw12'))
        ->addItem(new Item(12,'Cadeira Gamer',213, '0123ds'));


## Criar Pedido ##
$response = $stoneClient->criarPedido($pedido);

echo "CONTENT" . PHP_EOL;
var_dump($response->getContent());
var_dump($response->isSucess());
var_dump($response->getStatusCode());


## Fechar Pedido

// $stoneClient->fecharPedido(new FecharPedido(123,'canceled'));


# Imprimir Pedido

// $nota = new ImprimirNotaFiscal(
//                 '12312',
//                 'NFE',
//                 321,
//                 123,
//                 'jpg',"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wCEAAQEBAQEBAUFBQUHBwYHBwoJCAgJCg8KCwoLCg8WDhAODhAOFhQYExITGBQjHBgYHCMpIiAiKTEsLDE+Oz5RUW0BBAQEBAQEBQUFBQcHBgcHCgkICAkKDwoLCgsKDxYOEA4OEA4WFBgTEhMYFCMcGBgcIykiICIpMSwsMT47PlFRbf/CABEIAmoCRgMBIgACEQEDEQH"
//         );
// $stoneClient->imprimirNotaFiscal($nota);
