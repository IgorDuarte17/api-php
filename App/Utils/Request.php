<?php

namespace App\Utils;

class Request
{
    private $body;

    public function __construct()
    {
        $this->body = file_get_contents('php://input');
    }

    public function getBody()
    {
        return json_decode($this->body);
    }
}