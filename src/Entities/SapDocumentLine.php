<?php

namespace SAPLibrary\Entities;

class SapDocumentLine
{
    public $U_UNE_QTY;
    public $U_UNIT_RATE;
    public $TaxCode;
    public $UnitPrice;
    public $Price;
    public $ItemDescription;
    public $LocationCode;
    public $SACEntry;
    public $AccountCode;

    public function __construct(
        string $quantity,
        string $rate,
        string $taxCode,
        float $unitPrice,
        float $price,
        string $itemDescription,
        string $locationCode,
        string $sacEntry,
        string $accountCode
    ) {
        $this->U_UNE_QTY = $quantity;
        $this->U_UNIT_RATE = $rate;
        $this->TaxCode = $taxCode;
        $this->UnitPrice = $unitPrice;
        $this->Price = $price;
        $this->ItemDescription = $itemDescription;
        $this->LocationCode = $locationCode;
        $this->SACEntry = $sacEntry;
        $this->AccountCode = $accountCode;
    }
}