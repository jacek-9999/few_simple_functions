<?php

class Product
{
    private $name;
    private $priceBrutto;
    private $priceNetto;
    private $vatRateSymbol;
    private $vatRate;

    public function __construct($name, $priceBrutto, $vatRate)
    {
        $this->name = $name;
        $priceBrutto = preg_replace('/[zł]/', '', $priceBrutto);
        $priceBrutto = preg_replace('/[,]/', '.', $priceBrutto);
        $this->priceBrutto = round(floatval($priceBrutto), 2);
        $this->vatRateSymbol = $vatRate;
        $this->setVatRate($vatRate);
        $this->priceNetto = round($this->calculateNettoPrice(), 2);
    }

    private function setVatRate($vatRate)
    {
        $vatRate = preg_replace('/[%]/', '', $vatRate);
        if (!preg_match('/[0-9]/', $vatRate) || ($vatRate < 1)) {
            $this->vatRate = 0;
        } else {
            $this->vatRate = (floatval($vatRate) / 100) + 1;
        }
    }

    private function calculateNettoPrice()
    {
        return ($this->vatRate === 0) ? $this->priceBrutto : $this->priceBrutto / $this->vatRate ;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPriceBrutto()
    {
        return $this->priceBrutto;
    }
    public function getPriceNetto()
    {
        return $this->priceNetto;
    }
    public function getVatTaxAmount()
    {
        return $this->priceBrutto - $this->priceNetto;
    }
    public function getVatRate()
    {
        return $this->vatRate;
    }
    public function getVatRateSymbol()
    {
        return $this->vatRateSymbol;
    }
}