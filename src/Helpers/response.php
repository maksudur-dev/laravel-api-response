<?php

use Maksudur\ApiResponse\ApiResponse;
use Illuminate\Http\JsonResponse;

if (!function_exists('api_success')) {
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $status
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    function api_success($data = null, string $message = 'Success', int $status = 200, ?int $code = null): JsonResponse
    {
        return ApiResponse::success($data, $message, $status, $code);
    }
}

if (!function_exists('api_error')) {
    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  mixed  $errors
     * @param  int  $status
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
    function api_error(string $message = 'Error', $errors = null, int $status = 400, ?int $code = null): JsonResponse
    {
        return ApiResponse::error($message, $errors, $status, $code);
    }
}

if (!function_exists('api_paginate')) {
    /**
     * Return a paginated JSON response.
     *
     * @param  mixed  $paginator
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse
     */
    function api_paginate($paginator, string $message = 'Success', int $status = 200, ?int $code = null): JsonResponse
    {
        return ApiResponse::paginate($paginator, $message, $status, $code);
    }
}
