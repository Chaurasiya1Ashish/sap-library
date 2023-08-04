# Initial COnfiguration
Add the following to your env

```
SAP_DOMAIN=example.com
SAP_DB=my_sap_database
SAP_USERNAME=sap_user
SAP_PASSWORD=secret_password
```

## Publish the Configuration File:

you can use the `php artisan vendor:publish` command in your Laravel application to publish the `sap.php` configuration file from the SAPLibrary package to the Laravel application's config directory:

``php artisan vendor:publish --tag=config``

# Usage of SapInvoiceBuilder

The `SapInvoiceBuilder` is a builder class designed to create instances of the `SapInvoice` class in a more flexible and readable manner. It allows you to construct complex `SapInvoice` objects step by step, specifying only the desired properties.

## Getting Started

First, make sure you have the `SapInvoice` class and the `SapInvoiceBuilder` class included in your project. These classes should be in the `SAPLibrary` namespace.

```php
<?php

// Include the necessary classes
use SAPLibrary\SapInvoice;
use SAPLibrary\SapInvoiceBuilder;
```

## Creating a Simple Invoice

To create a simple invoice, you can use the SapInvoiceBuilder class as follows:

```
// Use the builder to construct the SapInvoice object
$invoice = (new SapInvoiceBuilder())
    ->withCardCode("9280")
    ->withNumAtCard("KS/WO/22-23/130")
    ->withOrder("2023/Jan/BLR_LULUMALL/1763/2159/KS/WO/22-23/130/21624")
    ->withDocDate("2023-03-01")
    ->withTaxDate("2023-03-01")
    ->withDocType("dDocument_Service")
    ->withSeries(1012)
    ->withBplIdAssignedToInvoice("5")
    ->withDocumentLine([
        /* Document Line 1 data */
    ])
    ->withDocumentLine([
        /* Document Line 2 data */
    ])
    // Add more document lines as needed
    ->withComments("This order was delivered at - Gopalapura, Binnipete, Bengaluru, Karnataka, Bangalore,Karnataka,560023")
    ->withPayToCode("Karnataka")
    ->withAddressExtension(/* AddressExtension object */)
    ->build();

```

##Creating an Invoice with Multiple Document Lines
To create an invoice with multiple document lines, you can chain multiple withDocumentLine calls to add each line individually.

```
$invoice = (new SapInvoiceBuilder())
    ->withCardCode("9280")
    // Add other properties
    ->withDocumentLine([
        /* Document Line 1 data */
    ])
    ->withDocumentLine([
        /* Document Line 2 data */
    ])
    ->withDocumentLine([
        /* Document Line 3 data */
    ])
    // Add more document lines as needed
    ->build();

```

