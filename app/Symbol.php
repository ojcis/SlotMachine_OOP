<?php

namespace App;

class Symbol
{
    private string $symbol;
    private int $chance;
    private int $value;

    public function __construct(string $symbol, int $chance, int $value)
    {
        $this->symbol = $symbol;
        $this->chance = $chance;
        $this->value = $value;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getChance(): int
    {
        return $this->chance;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
