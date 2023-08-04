<?php

return [
    'domain' => env('SAP_DOMAIN'),
    'sap_request_content' => [
        'CompanyDB' => env('SAP_DB'),
        'UserName' => env('SAP_USERNAME'),
        'Password' => env('SAP_PASSWORD'),
    ],
];
