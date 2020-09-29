<?php
require "Product.php";

class ProductList
{
    public $list = [];
    private $calculatedList = [];

    private $emptyCalculatedRow = [
        'priceNetto' => 0,
        'vatAmount' => 0,
        'priceBrutto' => 0
    ];

    public function addProduct($product)
    {
        $product = new Product($product['name'], $product['brutto'], $product['vat']);
        array_push($this->list, $product);
    }

    public function calculate()
    {
        $this->calculatedList = [];
        $this->calculatedList['all'] = $this->emptyCalculatedRow;
        foreach ($this->list as $product) {
            $vatRateSymbol = $product->getVatRateSymbol();
            if (!isset($this->calculatedList[$vatRateSymbol])) {
                $this->calculatedList[$vatRateSymbol] = $this->emptyCalculatedRow;
            }
            $this->calculatedList[$vatRateSymbol]['priceNetto']  += $product->getPriceNetto();
            $this->calculatedList[$vatRateSymbol]['vatAmount']   += $product->getVatTaxAmount();
            $this->calculatedList[$vatRateSymbol]['priceBrutto'] += $product->getPriceBrutto();
            $this->calculatedList['all']['priceNetto']           += $product->getPriceNetto();
            $this->calculatedList['all']['vatAmount']            += $product->getVatTaxAmount();
            $this->calculatedList['all']['priceBrutto']          += $product->getPriceBrutto();
        }
    }

    public function printList()
    {
        $this->calculatedList = array_reverse($this->calculatedList);
        echo("stawka vat | wartość netto | kwota VAT | wartość brutto\n");
        foreach ($this->calculatedList as $k => $v) {
            $k = ($k === 'all') ? 'razem' : $k;
            $space1 = str_repeat(' ', 11 - strlen($k));
            $space2 = str_repeat(' ', 14 - strlen($v['priceNetto']));
            $space3 = str_repeat(' ', 10 - strlen($v['vatAmount']));
            echo("$k$space1| {$v['priceNetto']}$space2| {$v['vatAmount']}$space3| {$v['priceBrutto']}\n");
        }
    }
}