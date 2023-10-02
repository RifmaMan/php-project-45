<?php

namespace BrainGames\Even;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line('Welcome to the Brain Game!');
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
            $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            break;
        }
    }
}
