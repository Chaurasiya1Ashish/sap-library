<?php

namespace SAPLibrary;

class SapInvoice extends SapDocument
{
    public $CardCode;
    public $NumAtCard;
    public $U_UTL_ORDR;
    public $DocDate;
    public $TaxDate;
    public $DocType;
    public $Series;
    public $BPL_IDAssignedToInvoice;
    public $DocumentLines;
    public $Comments;
    public $PayToCode;
    public $AddressExtension;

    public function __construct(
        string $cardCode,
        string $numAtCard,
        string $order,
        string $docDate,
        string $taxDate,
        string $docType,
        int $series,
        string $bplIdAssignedToInvoice,
        array $documentLines,
        string $comments,
        string $payToCode,
        SapAddressExtension $AddressExtension
    ) {
        parent::__construct($cardCode, $numAtCard, $docDate, $taxDate);
        $this->CardCode = $cardCode;
        $this->NumAtCard = $numAtCard;
        $this->U_UTL_ORDR = $order;
        $this->DocDate = $docDate;
        $this->TaxDate = $taxDate;
        $this->DocType = $docType;
        $this->Series = $series;
        $this->BPL_IDAssignedToInvoice = $bplIdAssignedToInvoice;
        $this->DocumentLines = $documentLines;
        $this->Comments = $comments;
        $this->PayToCode = $payToCode;
        $this->AddressExtension = $AddressExtension;
    }

    public function save(): void
    {
        // TODO: Implement save() method.
    }

    public static function getByFilter(array $filter): array
    {
        // TODO: Implement getByFilter() method.
    }
}