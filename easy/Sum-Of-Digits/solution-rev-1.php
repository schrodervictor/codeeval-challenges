<?php
// Open the input file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($test = fgets($fh))) {
    
    // explode the line, sum the elements and echo it
    echo array_sum(str_split($test)) . PHP_EOL;
}
fclose($fh);
exit(0);
