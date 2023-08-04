<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SAP Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can define the SAP connection parameters required for communication
    | with the SAP system. These values will be used in the SAPLibrary to connect
    | to the SAP system and perform operations like creating invoices, estimates,
    | and payments.
    |
    */

    'domain' => env('SAP_DOMAIN', 'example.com'),
    'db' => env('SAP_DB', 'sap_database'),
    'username' => env('SAP_USERNAME', 'sap_user'),
    'password' => env('SAP_PASSWORD', 'secret_password'),

    /*
    |--------------------------------------------------------------------------
    | SAP Document Series
    |--------------------------------------------------------------------------
    |
    | You can define the SAP document series to be used when creating SAP documents
    | like invoices, estimates, and payments. These series values should match the
    | configuration in your SAP system. You can add more series or customize them
    | based on your specific SAP setup.
    |
    */

    'invoice_series' => env('SAP_INVOICE_SERIES', 1012),
    'estimates_series' => env('SAP_ESTIMATES_SERIES', 1020),
    'payments_series' => env('SAP_PAYMENTS_SERIES', 1030),

    /*
    |--------------------------------------------------------------------------
    | SAP Address Extension
    |--------------------------------------------------------------------------
    |
    | You can define default address extension information that will be used when
    | creating SAP documents. This information can be used as a default value and
    | can be overridden on individual document creation.
    |
    */

    'address_extension' => [
        'BillToBuilding' => '123 Main Street',
        'BillToCity' => 'City',
        'BillToZipCode' => '12345',
        'BillToState' => 'ST',
        'BillToCountry' => 'US',
        'PlaceOfSupply' => 'ST',
    ],
];
