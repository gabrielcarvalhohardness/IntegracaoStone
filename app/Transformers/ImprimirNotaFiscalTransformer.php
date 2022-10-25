<?php
namespace App\Transformers;

use App\Request\ImprimirNotaFiscal;
use League\Fractal;

class ImprimirNotaFiscalTransformer extends Fractal\TransformerAbstract
{
	
	public function transform(ImprimirNotaFiscal $nota)
	{
		return [
			'type' => $nota->type,
			'size_v' => $nota->sizeVertical,
			'size_h' => $nota->sizeHorizontal,
			'format' => $nota->format,
			'content' => $nota->content
		];
	}
}