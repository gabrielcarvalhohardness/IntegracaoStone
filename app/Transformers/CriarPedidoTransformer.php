<?php
namespace App\Transformers;

use App\Request\CriarPedido;
use League\Fractal;

class CriarPedidoTransformer extends Fractal\TransformerAbstract
{
	public function transform(CriarPedido $pedido)
	{
		return [
			'customer' => [
				'name' => $pedido->customer->name,
				'email' => $pedido->customer->email,
			],
			'items' => $pedido->items,
			'closed' => $pedido->closed,
			'poi_payment_settings' => [
				'visible' => $pedido->paymentSetting->visible,
				'devices_serial_number' => $pedido->paymentSetting->devices,
				'display_name' => $pedido->paymentSetting->displayName,
				'payment_setup' => [
					'type' => $pedido->paymentSetting->paymentSetup->type,
					'installments' => $pedido->paymentSetting->paymentSetup->installments,
					'installments_type' => $pedido->paymentSetting->paymentSetup->installmentsType
				]
			]
		];
	}
}