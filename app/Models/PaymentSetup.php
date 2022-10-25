<?php

declare (strict_types = 1);

namespace App\Models;

class PaymentSetup {
    public $type;
    public $installments;
    public $installmentsType;    

    public function __construct($type, $installments, $installmentsType)
    {
        $this->type = $type;
        $this->installments = $installments;
        $this->installmentsType = $installmentsType;
    }
}