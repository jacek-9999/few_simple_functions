<?php

require("Tree.php");
require("Node.php");

$tree = new Tree();

$node = new Node("Base Node");
$tree->addNode($node);

foreach ($tree->getTree() as $oldNode) {
    $newNode = new Node("Node " . rand(0, 10));
    $tree->addNode($newNode, $oldNode->getId());
    $newNode = new Node("Node " . rand(0, 10));
    $tree->addNode($newNode, $oldNode->getId());
}

foreach ($tree->getTree() as $oldNode) {
    $newNode = new Node("Node " . rand(10, 20));
    $tree->addNode($newNode, $oldNode->getId());
    $newNode = new Node("Node " . rand(0, 10));
    $tree->addNode($newNode, $oldNode->getId());
}

foreach ($tree->getTree() as $oldNode) {
    $newNode = new Node("Node " . rand(20, 30));
    $tree->addNode($newNode, $oldNode->getId());
    $newNode = new Node("Node " . rand(0, 10));
    $tree->addNode($newNode, $oldNode->getId());
}

//var_dump($tree->getTree());
var_dump(json_encode($tree->getStats()));
var_dump(json_encode($tree->serializedNodes()));