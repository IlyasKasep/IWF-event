<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID', 'M3' . '96247399'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'Mid-client-' . 'GKU7laqdFbDQ26dW'),
    'server_key' => env('MIDTRANS_SERVER_KEY', 'Mid-server-' . '54D4Ub_4G0-50Q2-uyvvdk-b'),
    'is_production' => filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN),
    'is_sanitized' => filter_var(env('MIDTRANS_IS_SANITIZED', true), FILTER_VALIDATE_BOOLEAN),
    'is_3ds' => filter_var(env('MIDTRANS_IS_3DS', true), FILTER_VALIDATE_BOOLEAN),
];
