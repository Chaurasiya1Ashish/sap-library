<?php
namespace SAPLibrary;

class SapAddressExtension
{
    public $BillToBuilding;
    public $BillToCity;
    public $BillToZipCode;
    public $BillToState;
    public $BillToCountry;
    public $PlaceOfSupply;

    public function __construct(
        string $billToBuilding,
        string $billToCity,
        int $billToZipCode,
        string $billToState,
        string $billToCountry,
        string $placeOfSupply
    ) {
        $this->BillToBuilding = $billToBuilding;
        $this->BillToCity = $billToCity;
        $this->BillToZipCode = $billToZipCode;
        $this->BillToState = $billToState;
        $this->BillToCountry = $billToCountry;
        $this->PlaceOfSupply = $placeOfSupply;
    }
}