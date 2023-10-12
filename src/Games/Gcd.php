<?php

namespace BrainGames\Gcd;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line('Welcome to the Brain Game!');
    $userName = Engine\getUserName();

    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < 3; $i++) {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $gcd = getGcd($number1, $number2);
        $answer = Engine\askQuestion("{$number1} {$number2}");
        if ($answer == $gcd) {
            line('Correct!');
            if ($i === 2) {
                line("Congratulations, %s!", $userName);
            }
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $gcd);
            line("Let's try again, %s!", $userName);
            break;
        }
    }
}

function getGcd(...$numbers): int
{
    sort($numbers);
    $gcd = $numbers[0] + 1;
    do {
        $count = 0;
        $gcd--;
        for ($i = 0; $i < count($numbers); $i++) {
            if ($numbers[$i] % $gcd === 0) {
                $count++;
            }
        }
    } while ($count !== count($numbers));
    return $gcd;
}
