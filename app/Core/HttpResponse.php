<?php

namespace App\Core;

trait HttpResponse
{
    /**
     * Core of response
     *
     * @param string $message
     * @param array|object $data
     * @param integer $statusCode
     * @param boolean $isSuccess
     */
    public function httpResponse($message, $statusCode, $response = null, $isSuccess = false)
    {
        if (!$message) return response()->json(['message' => 'Message is required'], 500);

        return response()->json([
            'message' => $message,
            'error' => !$isSuccess,
            'code' => $statusCode,
            'response' => $response
        ], $statusCode);
    }
}
