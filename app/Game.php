<?php

namespace App;

class Game
{
    private array $screen;
    private array $winningLines;

    public function __construct(Symbols $symbols, array $winningLines, int $screenHeight=3, int $screenWidth=5)
    {
        $this->winningLines=$winningLines;
        $symbolsChance=$symbols->creatChances();
        for ($i=0;$i<$screenHeight;$i++) {
            for ($j=0;$j<$screenWidth;$j++) {
                $this->screen[$i][$j]=$symbolsChance[array_rand($symbolsChance)];
            }
        }
    }

    public function outputScreen(): string
    {
        $screen="<<-SLOTMACHINE->>".PHP_EOL;
        foreach ($this->screen as $row){
            $screen=$screen.'-';
            foreach ($row as $symbol){
                 $screen=$screen."[{$symbol->getSymbol()}]";
            }
            $screen=$screen.'-'.PHP_EOL;
        }
        return $screen;
    }

    private function getWinningSymbols(): array
    {
        $winningSymbols=[];
            foreach ($this->winningLines as $winingLine){
                $x1=$winingLine[0][0];
                $y1=$winingLine[0][1];//$x1, $y1 = first symbol coordinates in winningLine
                $count=0;
                foreach ($winingLine as [$x,$y]){
                    if ($this->screen[$x1][$y1]->getSymbol() != $this->screen[$x][$y]->getSymbol()){
                        break;
                    }
                    $count++;
                }
                if ($count==5){
                    $winningSymbols[]=$this->screen[$x1][$y1];
                }
            }
        return $winningSymbols;
    }

    public function getPrize(): int
    {
        $prize=0;
        $winningSymbols=$this->getWinningSymbols();
        if ($winningSymbols==0){
            return $prize;
        }
        foreach ($winningSymbols as $winningSymbol){
            $prize+=$winningSymbol->getValue();
        }
        return $prize;
    }
}
