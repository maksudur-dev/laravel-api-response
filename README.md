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
    'code' => 'code',
    'status' => 'success', // e.g., change 'status' to 'success'
    'message' => 'error', // e.g., change 'message' to 'error'
    'data' => 'data',
    'errors' => 'errors',
    'pagination' => 'pagination',
],
```

## Usage

### 1. Using Facade (Recommended)

```php
use ApiResponse;

// Default behavior: body code matches the HTTP status
return ApiResponse::success($data, 'User created', 201);
return ApiResponse::error('Invalid credentials.', null, 400);

// Custom application code in the body, separate from the HTTP status
return ApiResponse::success($data, 'Created', 201, 100);
return ApiResponse::error('Invalid credentials.', null, 400, 1000);

// Paginated response with custom body code
return ApiResponse::paginate($users, 'Success', 200, 100);
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

You can also pass a custom body code separately from the HTTP status:

```php
return api_success($data, 'Done', 200, 100);
return api_error('Invalid credentials.', null, 400, 1000);
```

## Response Formats

The `code` field is returned in the JSON body and can be a custom application code. When no explicit body code is provided, it defaults to the HTTP status code.

### Success Response
```json
{
  "code": 200,
  "status": true,
  "message": "Success",
  "data": { ... }
}
```

### Error Response
```json
{
  "code": 400,
  "status": false,
  "message": "Error",
  "errors": { ... }
}
```

### Pagination Response
```json
{
  "code": 200,
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
