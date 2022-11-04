<?php

declare(strict_types = 1);

namespace App\Response;

use JsonException;

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

       $content = self::convertToJson($jsonContent);
        return new static($statusCode, $content);
    }

    private static function convertToJson($json) {

        try {
            $content = json_decode($json);

            if (json_last_error() != \JSON_ERROR_NONE) {
                throw new JsonException(json_last_error_msg());
            }

            return $content;
        } catch(JsonException $exception) {
           return ''; 
        }
    }
}