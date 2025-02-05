<?php

return [
    'bot_api_key' => env('TELEGRAM_API_KEY', ''),
    'bot_username' => env('TELEGRAM_USERNAME', ''),
    'mysql'        => [
        'host'     => env('DB_HOST', '127.0.0.1'),
        'user'     => env('DB_USERNAME', 'forge'),
        'password' => env('DB_PASSWORD', ''),
        'database' => env('DB_DATABASE', 'forge'),
        'options'  => [
            'MYSQL_ATTR_SSL_CA' => env('MYSQL_ATTR_SSL_CA', null),
            'MYSQL_ATTR_SSL_CERT'     => env('MYSQL_ATTR_SSL_CA', null),
            'MYSQL_ATTR_SSL_KEY' => env('MYSQL_ATTR_SSL_CA', null),
        ]
    ]
];
