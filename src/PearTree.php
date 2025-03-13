<?php

namespace src;

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