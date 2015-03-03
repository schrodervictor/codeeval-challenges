<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Convert the number and output it
    echo hexdec($line) . PHP_EOL;
}
