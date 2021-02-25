<?php 

require 'ProductModel.php';


$p1 = new ProductModel(1, "PS5", 9.99);

echo $p1->getId() . "\n"; // 1

echo $p1->getName() . "\n"; // PS5

echo $p1->getPrice() . "\n"; // 9.99

echo $p1->getFinalPrice(20) . "\n"; // 11.988 

