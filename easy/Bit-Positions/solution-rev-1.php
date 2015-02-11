<?php
// Open the input file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($test = fgets($fh))) {

    // Grabbing all the elements we need
    list($num, $p1, $p2) = explode(',', rtrim($test));

    // Adjusting the indexes, because they are given
    // as 1-based positions
    $p1--;
    $p2--;

    // Converting to binary and reverting the string
    $num = strrev(base_convert($num, 10, 2));

    // Echo the solution
    echo (($num[$p1] === $num[$p2]) ? 'true': 'false') . PHP_EOL;
}
fclose($fh);
exit(0);
