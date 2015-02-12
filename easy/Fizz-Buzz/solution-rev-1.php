<?php

// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($test = fgets($fh))) {

    // Get all the elements we need
    list($a, $b, $n) = explode(' ', $test);

    // Set an initial empty result
    $return = '';

    // Loop the numbers
    for ($i = 1; $i <= $n; $i++) {

        // If it's divisible by $a is Fuzz
        $outF = ($i % $a) ? '' : 'F';

        // If it's divisible by $b is Buzz
        $outB = ($i % $b) ? '' : 'B';

        // If we don't have Fizz nor Buzz, it's the number
        $outI = ($outF || $outB) ? '' : $i;

        // Concat the parts
        $return .= $outI . $outF . $outB . ' ';
    }

    // Remove the trailing space
    $return = rtrim($return);

    // Echo the result
    echo $return . PHP_EOL;
}
fclose($fh);
exit(0);
