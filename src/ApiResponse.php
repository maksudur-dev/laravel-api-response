<?php

namespace Maksudur\ApiResponse;

use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, string $message = 'Success', int $code = 200): JsonResponse
    {
        return response()->json([
            config('api-response.keys.status', 'status') => true,
            config('api-response.keys.message', 'message') => $message,
            config('api-response.keys.data', 'data') => $data,
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  mixed  $errors
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(string $message = 'Error', $errors = null, int $code = 400): JsonResponse
    {
        return response()->json([
            config('api-response.keys.status', 'status') => false,
            config('api-response.keys.message', 'message') => $message,
            config('api-response.keys.errors', 'errors') => $errors,
        ], $code);
    }

    /**
     * Return a paginated JSON response.
     *
     * @param  mixed  $paginator
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function paginate($paginator, string $message = 'Success'): JsonResponse
    {
        if ($paginator instanceof LengthAwarePaginator || $paginator instanceof Paginator) {
            return response()->json([
                config('api-response.keys.status', 'status') => true,
                config('api-response.keys.message', 'message') => $message,
                config('api-response.keys.data', 'data') => $paginator->items(),
                config('api-response.keys.pagination', 'pagination') => [
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator instanceof LengthAwarePaginator ? $paginator->lastPage() : null,
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator instanceof LengthAwarePaginator ? $paginator->total() : null,
                ],
            ], 200);
        }

        return self::success($paginator, $message);
    }
}
