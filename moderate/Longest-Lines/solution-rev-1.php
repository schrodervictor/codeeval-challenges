<?php
// Open the file
$fh = fopen($argv[1], "r");

// Set a counter, only to detect the first line
$i = 0;

// Initialize an empty array to store the sentences
$sentences = array();

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // If it's the first line, store the number of
    // lines we need for the output
    if (0 === (int)$i) {
        $numLines = (int)$line;
        // Increment the counter to not pass here again
        $i++;
        continue;
    }

    // For all the other lines, just store the sentence in
    // the array, removing the line break at the end
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
