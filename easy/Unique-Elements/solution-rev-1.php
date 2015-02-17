<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Explode the line, keep only the unique elements and implode it back
    echo implode(',', array_unique(explode(',', trim($line)))) . PHP_EOL;
}
