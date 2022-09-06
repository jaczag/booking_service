<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponse
{
    /**
     * @param mixed $data
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse(
        mixed $data = null,
        int   $code = ResponseAlias::HTTP_OK
    ): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'data' => $data,
            'code' => $code
        ], $code);
    }

    /**
     * @param mixed $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse(
        mixed $message = null,
        int   $code = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR,
    ): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'code' => $code
        ], $code);
    }
}
