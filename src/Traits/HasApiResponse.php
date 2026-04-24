<?php

namespace Maksudur\ApiResponse\Traits;

use Illuminate\Http\JsonResponse;
use Maksudur\ApiResponse\ApiResponse;

trait HasApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiSuccess($data = null, string $message = 'Success', int $code = 200): JsonResponse
    {
        return ApiResponse::success($data, $message, $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  mixed  $errors
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiError(string $message = 'Error', $errors = null, int $code = 400): JsonResponse
    {
        return ApiResponse::error($message, $errors, $code);
    }

    /**
     * Return a paginated JSON response.
     *
     * @param  mixed  $paginator
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiPaginate($paginator, string $message = 'Success'): JsonResponse
    {
        return ApiResponse::paginate($paginator, $message);
    }
}
