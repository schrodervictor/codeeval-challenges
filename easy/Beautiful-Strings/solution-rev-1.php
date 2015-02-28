<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Remove everything from the string that doesn't matter
    $line = strtolower(preg_replace("/(\W|\d|_)/", '', $line));

    // Split the string into an array
    $chars = str_split($line);

    // Count how many different chars we have
    $count = array_count_values($chars);

    // Sort the count array
    rsort($count);

    // The maximun possible beauty of a char
    $i = 26;

    // Initialize a variable to hold the result
    $maxBeauty = 0;

    // Loop through the frequencies
    foreach ($count as $frequency) {
        // The beauty factor of this char
        $maxBeauty += $frequency*$i;
        // Decrease the beauty factor for
        // the next less frequent char
        $i--;
    }

    // Output the result
    echo $maxBeauty . PHP_EOL;

}
