<?php


namespace Api;


class ApiMessage
{
    public static function message($isSuccess, $code, $message = null, $payload = null)
    {
        return [
            'isSuccess' => $isSuccess,
            'message' => $message,
            'payload' => $payload,
            'code' => $code
        ];
    }
}



