<?php

declare (strict_types = 1);

namespace App\Models;

class Item {
    public $amount;
    public string $description;
    public $quantity;
    public string $code;

    public function __construct($amount,$description, $quantity, $code)
    {
        $this->amount = $amount * 100;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->code = $code;
    }
}