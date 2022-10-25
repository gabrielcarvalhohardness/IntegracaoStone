<?php

declare (strict_types = 1);

namespace App\Models;

class Item {
    public $amount;
    public $description;
    public $quantity;
    public $code;

    public function __construct($amount,$description, $quantity, $code)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->code = $code;
    }
}