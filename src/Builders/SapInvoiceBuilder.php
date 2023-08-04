<?php

namespace SAPLibrary\Builders;

class SapInvoiceBuilder
{
    private $cardCode;
    private $numAtCard;
    private $order;
    private $docDate;
    private $taxDate;
    private $docType;
    private $series;
    private $bplIdAssignedToInvoice;
    private $documentLines = [];
    private $comments;
    private $payToCode;
    private $addressExtension;

    public function withCardCode(string $cardCode): self
    {
        $this->cardCode = $cardCode;
        return $this;
    }

    public function withNumAtCard(string $numAtCard): self
    {
        $this->numAtCard = $numAtCard;
        return $this;
    }

    public function withOrder(string $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function withDocDate(string $docDate): self
    {
        $this->docDate = $docDate;
        return $this;
    }

    public function withTaxDate(string $taxDate): self
    {
        $this->taxDate = $taxDate;
        return $this;
    }

    public function withDocType(string $docType): self
    {
        $this->docType = $docType;
        return $this;
    }

    public function withSeries(int $series): self
    {
        $this->series = $series;
        return $this;
    }

    public function withBplIdAssignedToInvoice(string $bplIdAssignedToInvoice): self
    {
        $this->bplIdAssignedToInvoice = $bplIdAssignedToInvoice;
        return $this;
    }

    public function withDocumentLine(array $documentLine): self
    {
        $this->documentLines[] = $documentLine;
        return $this;
    }

    public function withComments(string $comments): self
    {
        $this->comments = $comments;
        return $this;
    }

    public function withPayToCode(string $payToCode): self
    {
        $this->payToCode = $payToCode;
        return $this;
    }

    public function withAddressExtension(SapAddressExtension $addressExtension): self
    {
        $this->addressExtension = $addressExtension;
        return $this;
    }

    public function build(): SapInvoice
    {
        return new SapInvoice(
            $this->cardCode,
            $this->numAtCard,
            $this->order,
            $this->docDate,
            $this->taxDate,
            $this->docType,
            $this->series,
            $this->bplIdAssignedToInvoice,
            $this->documentLines,
            $this->comments,
            $this->payToCode,
            $this->addressExtension
        );
    }
}
