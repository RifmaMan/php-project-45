<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): void
{
    line('Welcome to the Brain Games!');
}

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
