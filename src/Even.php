<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($answerCount = 1; $answerCount < 4; $answerCount++) {
        $number = rand(1, 100);
        line("Question: %s", $number);
        $answer = prompt('Your answer');
        if (
            $answer === 'yes' && $number % 2 !== 0
            || $answer === 'no' && $number % 2 === 0
            || !in_array($answer, ['yes', 'no'])
        ) {
            break;
        } else {
            line('Correct!');
        }
    }

    if ($answerCount === 4) {
        line("Congratulations, %s!", $name);
    } else {
        if (in_array($answer, ['yes', 'no'])) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $answer == 'yes' ? 'no' : 'yes');
        } else {
            line("valid answer 'yes' or 'no'.");
        }
        line("Let's try again, %s!", $name);
    }
}
