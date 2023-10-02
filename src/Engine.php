<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function getUserName(): string
{
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    return $name;
}

function askQuestion($question): string
{
    line("Question: %s", $question);
    $answer = prompt("Your answer:", false, ' ');
    return $answer;
}
