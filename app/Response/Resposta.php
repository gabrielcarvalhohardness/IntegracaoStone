<?php

declare(strict_types = 1);

namespace App\Response;

class Resposta {
    private int $statusCode;
    private $content;    
    private bool $sucess;

    public function __construct(int $statusCode, $content)
    {
        $this->sucess = $statusCode >= 200 && $statusCode <= 300;
        $this->statusCode = $statusCode;
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }
    public function isSucess() {
        return $this->sucess;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public static function createResponse(int $statusCode, $jsonContent) : static {

        $content = json_decode(json: $jsonContent, flags:JSON_THROW_ON_ERROR);
        return new static($statusCode, $content);
    }
}