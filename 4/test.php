<?php
require "ProductList.php";


$products = [
    ['name' => 'Produkt 1', 'brutto' => '100,33zł', 'quantity' => 5,  'vat' => '23%'],
    ['name' => 'Produkt 2', 'brutto' => '3,79zł',   'quantity' => 3,  'vat' => '8%'],
    ['name' => 'Produkt 3', 'brutto' => '99,11zł',  'quantity' => 1,  'vat' => '23%'],
    ['name' => 'Produkt 4', 'brutto' => '77,17zł',  'quantity' => 7,  'vat' => '23%'],
    ['name' => 'Produkt 5', 'brutto' => '14,22zł',  'quantity' => 7,  'vat' => '8%'],
    ['name' => 'Produkt 6', 'brutto' => '17,99zł',  'quantity' => 11, 'vat' => '0%'],
    ['name' => 'Produkt 7', 'brutto' => '17,99zł',  'quantity' => 11, 'vat' => 'zw'],
    ['name' => 'Produkt 8', 'brutto' => '20,99zł',  'quantity' => 7,  'vat' => 'zw']
];
$productList = new ProductList();
foreach ($products as $product) {
    for ($i = 0; $i < $product['quantity']; $i++) {
        $productList->addProduct($product);
    }
}
$productList->calculate();
$productList->printList();

$productList = new ProductList();
$products2 = [
    ['name' => 'Produkt 23vat', 'brutto' => '10,00zł',  'quantity' => 10,  'vat' => '23%'],
    ['name' => 'Produkt 8vat',  'brutto' => '10,00zł',  'quantity' => 10,  'vat' => '8%'],
    ['name' => 'Produkt 0vat',  'brutto' => '10,00zł',  'quantity' => 10, 'vat' => '0%'],
    ['name' => 'Produkt zw',    'brutto' => '10,00zł',  'quantity' => 10, 'vat' => 'zw'],
];
foreach ($products2 as $product) {
    for ($i = 0; $i < $product['quantity']; $i++) {
        $productList->addProduct($product);
    }
}
$productList = new ProductList();
$simpleProduct =
    ['name' => 'Produkt 23vat', 'brutto' => '12,30zł',  'quantity' => 10,  'vat' => '23%'];
$productList->addProduct($simpleProduct);
$productList->calculate();
$productList->printList(); // 23%        | 10            | 2.3       | 12.3
$productList->addProduct($simpleProduct);
$productList->calculate();
$productList->printList(); // 23%        | 20            | 4.6       | 24.6