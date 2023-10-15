<?php

namespace BrainGames\Calc;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame()
{
    Engine\greeting();
    $userName = Engine\getUserName();

    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $x = ['+', '-', '*'][rand(0, 2)];
        $answer = Engine\askQuestion("{$a} {$x} {$b}");
        if ($x === '+') {
            $result = $a + $b;
        } elseif ($x === '-') {
            $result = $a - $b;
        } elseif ($x === '*') {
            $result = $a * $b;
        }
        if ($answer == $result) {
            line('Correct!');
            if ($i === 2) {
                line("Congratulations, %s!", $userName);
            }
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $result);
            line("Let's try again, %s!", $userName);
            break;
        }
    }
}
