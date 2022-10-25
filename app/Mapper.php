<?php

declare(strict_types = 1);
namespace App;

use App\Request\CriarPedido;
use App\Transformers\CriarPedidoTransformer;
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

    public function mapPedido(CriarPedido $pedido) : string{

        $resource = new Item($pedido, new CriarPedidoTransformer);

        return $this->manager->createData($resource)->toJson();
    }
}