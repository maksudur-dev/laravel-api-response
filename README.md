# Laravel API Response Standardizer

A professional, production-ready Laravel package to standardize your API JSON responses. Developed by **Maksudur Rahman**.

## Features

- **PSR-4 Compliant**: Clean, object-oriented structure.
- **Multiple Usage Patterns**: Use Facades, Traits, or Global Helpers.
- **Fully Configurable**: Customize response keys (status, message, data, etc.) to match your needs.
- **Standardized Pagination**: Automatic formatting for Laravel's Paginator.
- **Zero Configuration**: Works out of the box, but highly customizable.
- **Compatible**: Supports Laravel 8, 9, 10, 11, 12, and 13.

## Installation

You can install the package via composer:

```bash
composer require maksudur-dev/laravel-api-response
```

### Configuration (Optional)

If you want to customize the response keys, publish the config file:

```bash
php artisan vendor:publish --provider="Maksudur\ApiResponse\ApiResponseServiceProvider" --tag="config"
```

This will create a `config/api-response.php` file where you can change the keys:

```php
'keys' => [
    'status' => 'success', // e.g., change 'status' to 'success'
    'message' => 'msg',
    // ...
],
```

## Usage

### 1. Using Facade (Recommended)

```php
use ApiResponse;

return ApiResponse::success($data, 'User created', 201);
return ApiResponse::error('Unauthorized', null, 401);
return ApiResponse::paginate($users);
```

### 2. Using Trait (Best for Controllers)

Add the `HasApiResponse` trait to your controller:

```php
use Maksudur\ApiResponse\Traits\HasApiResponse;

class UserController extends Controller
{
    use HasApiResponse;

    public function index()
    {
        $users = User::paginate(10);
        return $this->apiPaginate($users);
    }
}
```

### 3. Using Global Helpers

```php
return api_success($data);
return api_error('Invalid input');
return api_paginate($paginator);
```

## Response Formats

### Success Response
```json
{
  "status": true,
  "message": "Success",
  "data": { ... }
}
```

### Error Response
```json
{
  "status": false,
  "message": "Error",
  "errors": { ... }
}
```

### Pagination Response
```json
{
  "status": true,
  "message": "Success",
  "data": [ ... ],
  "pagination": {
    "current_page": 1,
    "last_page": 5,
    "per_page": 10,
    "total": 50
  }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
