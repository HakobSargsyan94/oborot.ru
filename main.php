<?php

use src\AppleTree;
use src\Harvester;
use src\Orchard;
use src\PearTree;

require_once "./src/Fruit.php";
require_once "./src/Apple.php";
require_once "./src/Pear.php";
require_once "./src/Tree.php";
require_once "./src/AppleTree.php";
require_once "./src/PearTree.php";
require_once "./src/Orchard.php";
require_once "./src/Harvester.php";

// Main script
$orchard = new Orchard();
for ($i = 1; $i <= 10; $i++) {
    $orchard->addTree(new AppleTree($i));
}
for ($i = 11; $i <= 25; $i++) {
    $orchard->addTree(new PearTree($i));
}

$fruits = $orchard->harvestAll();
Harvester::analyzeHarvest($fruits);
