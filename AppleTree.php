<?php

namespace src;

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