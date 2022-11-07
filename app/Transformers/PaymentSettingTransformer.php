<?php
namespace App\Transformers;

use App\Models\Customer;
use App\Models\PaymentSetting;
use App\Request\CriarPedido;
use League\Fractal;
use League\Fractal\Resource\NullResource;

class PaymentSettingTransformer extends Fractal\TransformerAbstract
{	
    protected array $defaultIncludes = [
        'paymentSetup'
    ];

	public function transform(PaymentSetting $paymentSetting)
	{
        return [			
				'visible' => $paymentSetting->visible,
				'devices_serial_number' => $paymentSetting->devices,
				'display_name' => $paymentSetting->displayName						
		];
	}	

    public function includePaymentSetup(PaymentSetting $paymentSetting)
    {
        $paymentSetup = $paymentSetting->paymentSetup;		
        
        return $paymentSetup ? $this->item($paymentSetup, new PaymentSetupTransformer) : null;
    }
}