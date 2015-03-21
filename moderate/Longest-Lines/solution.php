<?php
// Open the file
$fh = fopen($argv[1], "r");

// Get the first line, with the number of lines needed for the output
$numLines = (int)fgets($fh);

// Initialize an empty array to store the sentences
$sentences = array();

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Store each sentence in the array,
    // removing the line break at the end
    $sentences[] = trim($line);
}

// Sort the sentences by the length
usort($sentences, function($a, $b) {
    return strlen($b) - strlen($a);
});

// Take a slice from the array with the right size
$slice = array_slice($sentences, 0, $numLines);

// Output the result
echo implode(PHP_EOL, $slice);
