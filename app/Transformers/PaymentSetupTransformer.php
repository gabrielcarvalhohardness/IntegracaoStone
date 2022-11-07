<?php
namespace App\Transformers;

use App\Models\Customer;
use App\Models\PaymentSetup;
use App\Request\CriarPedido;
use League\Fractal;
use League\Fractal\Resource\NullResource;

class PaymentSetupTransformer extends Fractal\TransformerAbstract
{	
	public function transform(PaymentSetup $paymentSetup)
	{        
		return [
            'type' => $paymentSetup->type,
            'installments' => $paymentSetup->installments,
            'installment_type' => $paymentSetup->installmentsType
        ];
	}	
}