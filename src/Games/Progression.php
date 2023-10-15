<?php

namespace BrainGames\Progression;

use BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function startGame()
{
    Engine\greeting();
    $userName = Engine\getUserName();

    line('What number is missing in the progression?');
    $stepCount = 10;
    for ($i = 0; $i < 3; $i++) {
        $increaseByNumber = rand(1, 10);
        $progression = getProgression($stepCount, $increaseByNumber);
        $answer = Engine\askQuestion($progression->string);
        if ($answer == $progression->hiddenItem) {
            line('Correct!');
            if ($i === 2) {
                line("Congratulations, %s!", $userName);
            }
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $progression->hiddenItem);
            line("Let's try again, %s!", $userName);
            break;
        }
    }
}

function getProgression($stepCount = 5, $increaseByNumber = 2): object
{
    $hiddenItemIndex = rand(0, $stepCount - 1);
    $progression = [];
    for ($i = 0; $i < $stepCount; $i++) {
        if ($i === 0) {
            $progression[] = rand(1, 10);
        } else {
            $progression[] = $progression[$i - 1] + $increaseByNumber;
        }
    }
    $hiddenItem = $progression[$hiddenItemIndex];
    $progression[$hiddenItemIndex] = '..';
    $result = (object)[
        'string' => implode(' ', $progression),
        'hiddenItem' => $hiddenItem
    ];
    return $result;
}
