<?php

use Maksudur\ApiResponse\ApiResponse;
use Illuminate\Http\JsonResponse;

if (!function_exists('api_success')) {
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $status_code
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    function api_success($data = null, string $message = 'Success', int $status_code = 100, int $code = 200): JsonResponse
    {
        return ApiResponse::success($data, $message, $status_code, $code);
    }
}

if (!function_exists('api_error')) {
    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  mixed  $errors
     * @param  int  $status_code
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    function api_error(string $message = 'Error', $errors = null, int $status_code = 400, int $code = 400): JsonResponse
    {
        return ApiResponse::error($message, $errors, $status_code, $code);
    }
}

if (!function_exists('api_paginate')) {
    /**
     * Return a paginated JSON response.
     *
     * @param  mixed  $paginator
     * @param  string  $message
     * @param  int  $status_code
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    function api_paginate($paginator, string $message = 'Success', int $status_code = 100, int $code = 200): JsonResponse
    {
        return ApiResponse::paginate($paginator, $message, $status_code, $code);
    }
}
