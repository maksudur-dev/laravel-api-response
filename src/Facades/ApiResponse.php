<?php

namespace Maksudur\ApiResponse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\JsonResponse success($data = null, string $message = 'Success', int $status_code = 200, int $code = 200)
 * @method static \Illuminate\Http\JsonResponse error(string $message = 'Error', $errors = null, int $status_code = 400, int $code = 400)
 * @method static \Illuminate\Http\JsonResponse paginate($paginator, string $message = 'Success', int $status_code = 200, int $code = 200)
 *
 * @see \Maksudur\ApiResponse\ApiResponse
 */
class ApiResponse extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'api-response';
    }
}
