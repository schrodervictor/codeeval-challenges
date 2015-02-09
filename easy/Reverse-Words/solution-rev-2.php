<?php
// Open the input file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($test = fgets($fh))) {

    // Clean the input
    $test = trim($test);

    // Test if we have a empty line and ignore it
    if('' === $test) {
        echo PHP_EOL;
        continue;
    }

    // Explode the word list
    $words = explode(' ', $test);

    // Reverse the list
    $words = array_reverse($words);

    // Implode it back and output the results
    echo implode(' ', $words) . PHP_EOL;
}
fclose($fh);
exit(0);
