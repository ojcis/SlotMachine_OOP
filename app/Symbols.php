<?php

namespace App;

class Symbols
{
    private array $symbols;

    public function __construct(array $symbols)
    {
        $this->symbols = $symbols;
    }

    public function creatChances(): array
    {
        $symbolChances=[];
        foreach ($this->symbols as $symbol){
            for ($i=1;$i<=$symbol->getChance();$i++){
                $symbolChances[]=$symbol;
            }
        }
        return $symbolChances;
    }
}
