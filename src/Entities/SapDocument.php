<?php


namespace SAPLibrary;

use GuzzleHttp\Client;

abstract class SapDocument
{
    public $CardCode;
    public $NumAtCard;
    public $DocDate;
    public $TaxDate;

    protected $sapConfig;

    public function __construct(string $cardCode, string $numAtCard, string $docDate, string $taxDate)
    {
        $this->CardCode = $cardCode;
        $this->NumAtCard = $numAtCard;
        $this->DocDate = $docDate;
        $this->TaxDate = $taxDate;
        $this->sapConfig = config('sap');
    }

    public function toJson(): string
    {
        // Convert the SAPDocument object to a JSON payload
        return json_encode($this, JSON_PRETTY_PRINT);
    }

    public function save(): bool
    {

        $invoiceData = $this->toJson();

        $url = "https://{$this->sapConfig['domain']}/b1s/v1/Invoices";

        $client = new Client();

        try {
            // Make a POST request to SAP API to create the invoice
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Cookie' => "B1SESSION={$this->sapConfig['session']}",
                ],
                'body' => $invoiceData,
            ]);

            // Handle the response if needed
            $statusCode = $response->getStatusCode();
            if ($statusCode === 201) {
                // Invoice created successfully
                return true;
            } else {
                // Handle other status codes if required
                // ...
                return false;
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occurred during the request
            // Log the error, notify admins, etc.
            // ...
            return false;
        }
    }

    public static function getByFilter(array $filter): array {
        return array();
    }
}