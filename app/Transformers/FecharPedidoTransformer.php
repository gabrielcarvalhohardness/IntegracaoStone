<?php
namespace App\Transformers;

use App\Request\FecharPedido;
use League\Fractal;

class FecharPedidoTransformer extends Fractal\TransformerAbstract
{
	public function transform(FecharPedido $pedido)
	{
		return [
			'status' => $pedido->status
		];
	}
}