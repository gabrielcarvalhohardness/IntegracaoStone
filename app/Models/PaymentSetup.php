<?php

declare (strict_types = 1);

namespace App\Models;

class PaymentSetup {
    public string $type;
    public int $installments;
    public string $installmentsType;    

    public function __construct($type, $installments, $installmentsType)
    {
        $this->type = $type;
        $this->installments = $installments;
        $this->installmentsType = $installmentsType;
    }
}