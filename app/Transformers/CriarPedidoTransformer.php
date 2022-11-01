<?php
namespace App\Transformers;

use App\Request\CriarPedido;
use League\Fractal;

class CriarPedidoTransformer extends Fractal\TransformerAbstract
{
	protected array $defaultIncludes = [
        'customer'
    ];

	public function transform(CriarPedido $pedido)
	{
		return [			
			'items' => $pedido->items,
			'closed' => $pedido->closed,
			'poi_payment_settings' => [
				'visible' => $pedido->paymentSetting->visible,
				'devices_serial_number' => $pedido->paymentSetting->devices,
				'display_name' => $pedido->paymentSetting->displayName,
				'payment_setup' => [
					'type' => $pedido->paymentSetting->paymentSetup->type,
					'installments' => $pedido->paymentSetting->paymentSetup->installments,
					'installment_type' => $pedido->paymentSetting->paymentSetup->installmentsType
				]
			]
		];
	}
	
	public function includeCustomer(CriarPedido $pedido)
    {
        $customer = $pedido->customer;

		if($customer === null) $this->null();

        return $this->item($customer, new CustomerTransformer);
    }
}