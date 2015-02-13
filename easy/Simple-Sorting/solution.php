<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Separate the numbers
    $numbers = explode(' ', trim($line));

    // Sort the array, using numeric sorting
    sort($numbers, SORT_NUMERIC);

    // Implode the numbers together again and output the result
    echo implode(' ', $numbers) . PHP_EOL;
}
