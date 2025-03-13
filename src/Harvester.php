<?php

namespace src;

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