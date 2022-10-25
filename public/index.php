<?php

use App\Models\Customer;
use App\Models\Item;
use App\Models\PaymentSetting;
use App\Models\PaymentSetup;
use App\Request\CriarPedido;
use App\StoneClient;

require __DIR__ . "./../vendor/autoload.php";


$stoneClient = new StoneClient('API_KEY');

$customer = new Customer('Gabriel','Carvalho');
$paymentSetup = new PaymentSetup('credit',2,'merchant');
$paymentSetting = new PaymentSetting(true,['d6as4da6s5', '65sad4621'], 'Pedido 10',$paymentSetup);
$pedido = new CriarPedido($customer, false,$paymentSetting);
$pedido->addItem(new Item(1990,'Chaveiro',12,'kldjw12'))
        ->addItem(new Item(12,'Cadeira Gamer',213, '0123ds'));

// var_dump($pedido);
$stoneClient->criarPedido($pedido);