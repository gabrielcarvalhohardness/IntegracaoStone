<?php

declare(strict_types = 1);

namespace App\Request;

use App\Models\Customer;
use App\Models\Item;
use App\Models\PaymentSetting;

class CriarPedido {
    public ?Customer $customer;
    public array $items;
    public bool $closed;
    public PaymentSetting $paymentSetting;

    public function __construct(Customer $customer, PaymentSetting $paymentSetting,bool $closed = false)
    {
        $this->customer = $customer;
        $this->items = [];
        $this->closed = $closed;
        $this->paymentSetting = $paymentSetting;
    }

    public function addItem(Item $item)   {
        $this->items[] = $item;
        return $this;
    }
}