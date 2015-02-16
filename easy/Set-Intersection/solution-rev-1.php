<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Remove the line break
    $line = trim($line);

    // Separate the lists
    list($list1, $list2) = explode(';', $line);

    // Generate the arrays
    $list1 = explode(',', $list1);
    $list2 = explode(',', $list2);

    // Find the intersection
    $intersect = array_intersect($list1, $list2);

    // If any intersection was found, implode and output it
    if ($intersect) {
        echo implode(',', $intersect);
    }

    // Output the line break anyway
    echo PHP_EOL;
}
