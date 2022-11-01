<?php
namespace App\Transformers;

use App\Models\Customer;
use App\Request\CriarPedido;
use League\Fractal;
use League\Fractal\Resource\NullResource;

class CustomerTransformer extends Fractal\TransformerAbstract
{	
	public function transform(Customer $customer =null)
	{
		if (!$customer) return [];
		
		$data =  [			
				'name' => $customer->name,
				'email' => $customer->email,
		];

		if(empty($customer->email)) unset($data['email']);

		return $data;
	}	
}