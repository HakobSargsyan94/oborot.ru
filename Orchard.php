<?php

namespace src;

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