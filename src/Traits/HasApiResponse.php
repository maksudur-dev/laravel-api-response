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
     * @param  int  $status_code
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiSuccess($data = null, string $message = 'Success', int $status_code = 200, ?int $code = null): JsonResponse
    {
        return ApiResponse::success($data, $message, $status_code, $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  mixed  $errors
     * @param  int  $status_code
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiError(string $message = 'Error', $errors = null, int $status_code = 400, ?int $code = null): JsonResponse
    {
        return ApiResponse::error($message, $errors, $status_code, $code);
    }

    /**
     * Return a paginated JSON response.
     *
     * @param  mixed  $paginator
     * @param  string  $message
     * @param  int  $status_code
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiPaginate($paginator, string $message = 'Success', int $status_code = 200, ?int $code = null): JsonResponse
    {
        return ApiResponse::paginate($paginator, $message, $status_code, $code);
    }
}
