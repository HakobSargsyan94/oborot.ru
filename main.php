<?php

class Fruit
{
    public int $weight;
    public int $treeId;

    public function __construct(int $weight, int $treeId)
    {
        $this->weight = $weight;
        $this->treeId = $treeId;
    }
}

class Apple extends Fruit
{
}

class Pear extends Fruit
{
}

class Tree
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}

class AppleTree extends Tree
{
    public function harvest(): array
    {
        $count = rand(40, 50);
        $apples = [];
        for ($i = 0; $i < $count; $i++) {
            $apples[] = new Apple(rand(150, 180), $this->id);
        }

        return $apples;
    }
}

class PearTree extends Tree
{
    public function harvest(): array
    {
        $count = rand(0, 20);
        $pears = [];
        for ($i = 0; $i < $count; $i++) {
            $pears[] = new Pear(rand(130, 170), $this->id);
        }

        return $pears;
    }
}

class Orchard
{
    private array $trees = [];

    /**
     * @param Tree $tree
     * @return void
     */
    public function addTree(Tree $tree): void
    {
        $this->trees[] = $tree;
    }

    /**
     * @return array
     */
    public function harvestAll(): array
    {
        $fruits = [];
        foreach ($this->trees as $tree) {
            $fruits = array_merge($fruits, $tree->harvest());
        }

        return $fruits;
    }
}

class Harvester
{
    /**
     * @param array $fruits
     * @return void
     */
    public static function analyzeHarvest(array $fruits): void
    {
        $apples = array_filter($fruits, fn($f) => $f instanceof Apple);
        $pears = array_filter($fruits, fn($f) => $f instanceof Pear);

        echo "Total Apples: " . count($apples) . "\n";
        echo "Total Pears: " . count($pears) . "\n";
        echo "Total Apple Weight: " . array_sum(array_map(fn($a) => $a->weight, $apples)) . "g\n";
        echo "Total Pear Weight: " . array_sum(array_map(fn($p) => $p->weight, $pears)) . "g\n";

        if (!empty($apples)) {
            $heaviestApple = array_reduce($apples, fn($max, $a) => $a->weight > $max->weight ? $a : $max, $apples[0]);
            echo "Heaviest Apple: " . $heaviestApple->weight . "g from tree " . $heaviestApple->treeId . "\n";
        }
    }
}

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
