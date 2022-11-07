<?php
namespace App\Transformers;

use App\Request\CriarPedido;
use League\Fractal;

class CriarPedidoTransformer extends Fractal\TransformerAbstract
{
	protected array $defaultIncludes = [
        'customer','poi_payment_settings'
    ];

	public function transform(CriarPedido $pedido)
	{
		return [			
			'items' => $pedido->items,
			'closed' => $pedido->closed			
		];
	}
	
	public function includeCustomer(CriarPedido $pedido)
    {
        $customer = $pedido->customer;

		if($customer === null) $this->null();

        return $this->item($customer, new CustomerTransformer);
    }
	public function includePoiPaymentSettings(CriarPedido $pedido)
    {
        $paymentSetting = $pedido->paymentSetting;		

        return $this->item($paymentSetting, new PaymentSettingTransformer);
    }
}