<?php

namespace src;
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