<?php
// Open the input file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($test = fgets($fh))) {

    // Grab the data we need
    list($a, $b) = explode(',', rtrim($test));

    // Create the result variable
    $res = $b;

    // Loop and sum (they told that we are not allowed
    // to use division or modulo operations)
    while($res < $a) {
        $res += $b;
    }

    // Echo the result
    echo $res . PHP_EOL;
}
fclose($fh);
exit(0);
