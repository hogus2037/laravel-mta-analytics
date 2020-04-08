<?php

return [
    
    'default' => 'h5',

    'gateways' => [
        'h5' => [
            'driver' => 'H5',
            'app_id'     => env('MTA_H5_APP_ID', ''),
            'secret_key'     => env('MTA_H5_SECRET_KEY', '')
        ],
        'mini' => [
            'driver' => 'Mini',
            'app_id'     => env('MTA_MINI_APP_ID', ''),
            'secret_key'     => env('MTA_MINI_SECRET_KEY', '')
        ],
        'app' => [
            'driver' => 'App',
            'app_id'     => env('MTA_APP_APP_ID', ''),
            'secret_key'     => env('MTA_APP_SECRET_KEY', '')
        ]
    ]
];
