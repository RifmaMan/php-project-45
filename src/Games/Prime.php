<?php

namespace BrainGames\Prime;

use BrainGames\Engine;
use function cli\line;

function startGame(): void
{
    Engine\greeting();
    $userName = Engine\getUserName();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 3571);
        $answer = Engine\askQuestion($number);
        $result = isPrimeNumber($number);
        if ($result === $answer) {
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

function isPrimeNumber($number): string
{
    if (!is_numeric($number) || $number === 1) {
        return 'no';
    }
    for ($i = 2; $i < $number; $i++) {
        if ($i !== $number && $number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}
