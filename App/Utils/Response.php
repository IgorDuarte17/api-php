<?php

namespace App\Utils;

class Response
{

    public static function success($data = null)
    {

        http_response_code(200);
        $response = [
            'message' => 'Sucesso na requisição',
            'data' => $data
        ];

        return json_encode($response);
    }

    public static function bad($msg)
    {
        http_response_code(401);
        $response = [
            'message' => $msg,
            'data' => null
        ];

        return json_encode($response);
    }

    public static function error()
    {

        http_response_code(500);
        $response = [
            'message' => 'Houve um erro interno. Tente novamente mais tarde.',
            'data' => null
        ];

        return json_encode($response);
    }
}