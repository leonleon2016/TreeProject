<?php

class Fruit {
    public float $weight;
    public string $type;

    function __construct(array $fruit)
    {
        $this->weight = $fruit['weight'];
        $this->type = $fruit['type'];
    }
}