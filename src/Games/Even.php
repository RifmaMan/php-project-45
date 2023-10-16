<?php

namespace BrainGames\Even;

use BrainGames\Engine;
use function cli\line;

function startGame(): void
{
    Engine\greeting();
    $userName = Engine\getUserName();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        $answer = Engine\askQuestion($number);
        if (
            $answer === 'yes' && $number % 2 === 0
            || $answer === 'no' && $number % 2 !== 0
        ) {
            line('Correct!');
            if ($i === 2) {
                line("Congratulations, %s!", $userName);
            }
        } else {
            $result = $number % 2 === 0 ? 'yes' : 'no';
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $result);
            line("Let's try again, %s!", $userName);
            break;
        }
    }
}
