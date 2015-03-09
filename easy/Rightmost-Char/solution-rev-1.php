<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Get the relevant information
    list($seq, $char) = explode(',', $line);

    // Find the first reverse occurence of the char
    $position = strrpos($seq, $char[0]);

    // Output the result
    if (false === $position) {
        echo '-1';
    } else {
        echo $position;
    }

    // And the line break
    echo PHP_EOL;
}
