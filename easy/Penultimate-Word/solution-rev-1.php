<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Explode the line to have an array of words
    $words = explode(' ', $line);

    // Get only the penultimate word
    echo $words[count($words) - 2] . PHP_EOL;
}
