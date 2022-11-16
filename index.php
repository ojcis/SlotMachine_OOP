<?php

require_once 'vendor/autoload.php';

use App\Symbol;
use App\Symbols;
use App\Game;

$symbols=new Symbols([
    new Symbol('!',4,5),
    new Symbol('7', 3,10),
    new Symbol('*',2,100),
    new Symbol('$',1,500)
]);

$winingLines=[
    [[0,0],[0,1],[0,2],[0,3],[0,4]],
    [[1,0],[1,1],[1,2],[1,3],[1,4]],
    [[2,0],[2,1],[2,2],[2,3],[2,4]],
    [[0,0],[1,1],[2,2],[1,3],[0,4]],
    [[2,0],[1,1],[0,2],[1,3],[2,4]],
    [[0,0],[0,1],[1,2],[2,3],[2,4]],
    [[2,0],[2,1],[1,2],[0,3],[0,4]],
    [[1,0],[0,1],[1,2],[2,3],[1,4]],
    [[1,0],[2,1],[1,2],[0,3],[1,4]],
    [[0,0],[1,1],[1,2],[1,3],[2,4]],
    [[2,0],[1,1],[1,2],[1,3],[0,4]]
];

ADD_MONEY:
$money=readline('Insert your money: $');
START:
echo PHP_EOL;
$money=$money-1;
$game=new Game($symbols,$winingLines);
echo $game->outputScreen().PHP_EOL;
echo "YOU WON: $".$game->getPrize().PHP_EOL;
$money+=$game->getPrize();
if ($money==0){
    while (true) {
        $choice = readline("You are out of money! Do yo want add more money?[y/n]: ");
        if ($choice == 'y') goto ADD_MONEY;
        if ($choice == 'n') exit('BYE! TILL NEXT TIME!'.PHP_EOL);
        echo 'invalid input!'.PHP_EOL;
    }
}
echo "your balance: $$money".PHP_EOL;
$choice=readline("Press enter to spin again! enter 'n' to end ");
if ($choice=='n') exit('BYE! TILL NEXT TIME!'.PHP_EOL);
goto START;



