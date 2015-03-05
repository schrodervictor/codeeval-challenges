<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Grab the numbers from the input
    list($n, $m) = explode(',', trim($line));

    // How many M's fits in one N?
    $max = (int)($n / $m);

    // Get the difference
    $mod = $n - $m*$max;

    // Output the result
    echo $mod . PHP_EOL;

}
