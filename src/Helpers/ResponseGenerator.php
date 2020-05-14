<?php

namespace App\Helpers;
use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseGenerator
{

    public static function makeResponse($success, $code, $result)
    {

       return new JsonResponse([
            'success' => $success,
            'code' => $code,
            'message' => $result
        ]);

    }


}