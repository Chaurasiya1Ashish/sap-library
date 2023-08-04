<?php


namespace SAPLibrary;


abstract class SapDocument
{
    public $CardCode;
    public $NumAtCard;
    public $DocDate;
    public $TaxDate;

    public function __construct(string $cardCode, string $numAtCard, string $docDate, string $taxDate)
    {
        $this->CardCode = $cardCode;
        $this->NumAtCard = $numAtCard;
        $this->DocDate = $docDate;
        $this->TaxDate = $taxDate;

    }

    public function toJson(): string
    {
        // Convert the SAPDocument object to a JSON payload
        return json_encode($this, JSON_PRETTY_PRINT);
    }

    abstract public function save(): void;
    abstract public static function getByFilter(array $filter): array;
}