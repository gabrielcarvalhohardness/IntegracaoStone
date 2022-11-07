<?php

declare (strict_types = 1);

namespace App\Models;

class PaymentSetting {
    public bool $visible;
    public array $devices;
    public string $displayName;
    public ?PaymentSetup $paymentSetup;

    public function __construct($visible, array $devices, string $displayName, ?PaymentSetup $paymentSetup = null)
    {
        $this->visible = $visible;
        $this->devices = $devices;
        $this->displayName = $displayName;
        $this->paymentSetup = $paymentSetup;        
    }
}