<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'customers',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],
        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],
        'customers' => [
            'driver' => 'sanctum',
            'provider' => 'customers',
        ],
        'employee' => [
            'driver' => 'session',
            'provider' => 'employees',
        ],
        'employees' => [
            'driver' => 'sanctum',
            'provider' => 'employees',
        ],
    ],

    'providers' => [
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],

        'employees' => [
            'driver' => 'eloquent',
            'model' => App\Models\Employee::class,
        ],
    ],

    'passwords' => [
        'customers' => [
            'provider' => 'customers',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'employees' => [
            'provider' => 'employees',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
