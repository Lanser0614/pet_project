<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponse
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse(Collection $result, string $message): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(array $message): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError(string $error, array $errorMessages = [], int $code = 404): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
