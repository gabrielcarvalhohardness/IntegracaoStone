<?php

declare(strict_types = 1);
namespace App;

use App\Request\CriarPedido;
use App\Request\FecharPedido;
use App\Request\ImprimirNotaFiscal;
use App\Transformers\CriarPedidoTransformer;
use App\Transformers\FecharPedidoTransformer;
use App\Transformers\ImprimirNotaFiscalTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

class Mapper {

    private Manager $manager;
    public function __construct()
    {
        $this->manager = new Manager();
        $this->manager->setSerializer(new ArraySerializer);
    } 

    public function mapCriarPedido(CriarPedido $pedido){

        $resource = new Item($pedido, new CriarPedidoTransformer);

        return $this->manager->createData($resource)->toArray();
    }

    public function mapFecharPedido(FecharPedido $pedido) {
        $resource = new Item($pedido, new FecharPedidoTransformer);        
        return $this->manager->createData($resource)->toArray();
    }

    public function mapImprimirNota(ImprimirNotaFiscal $nota) {
        $resource = new Item($nota, new ImprimirNotaFiscalTransformer);        
        return $this->manager->createData($resource)->toArray();
    }
}