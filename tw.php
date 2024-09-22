<?php


$sentence = "Willkommen in der AG Informatik.";

$text = <<<TEXT

Das Programmieren von Software ist
eigentlich gar nicht so schwer, wenn
man sich vorher einfach einen kleinen
Plan macht.

TEXT;


function typeWriter(string $sentence, int $milliSeconds = 50): void
{
    for ($i = 0; $i < strlen($sentence); $i++) {
        echo $sentence[$i];
        usleep($milliSeconds * 1000);
    }
    echo PHP_EOL;
    readline("Enter drücken... ");
}

typeWriter($sentence);
typeWriter($text, 25);