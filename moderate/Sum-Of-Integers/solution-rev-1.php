<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Sanitize and explode the line
    $numbers = explode(',', trim($line));

    // Grab the amout of values we have to analyze
    $len = count($numbers);

    // Edge case: if we have only one number, it is the answer
    if (1 === $len) {
        echo $numbers[0] . PHP_EOL;
        continue;
    }

    // Convert all to numeric type
    array_walk($numbers,
        function(&$value, $key) {
            $value = (int)$value;
        }
    );

    // Initialize an empty array to hold the sums
    $sums = array();

    // Begin to walk the array
    array_walk($numbers,
        // We pall the $sums array by reference
        function(&$value, $key) use ($len, $numbers, &$sums) {
            // For each element, calculate all the possible sums
            // from itself until the last, them until one before the last
            // and so on
            for($i = 1; $i <= $len - $key; $i++) {
                $sums[] = array_sum(array_slice($numbers, $key, $i));
            }
        }
    );

    // Echo only the greatest value calculated
    echo max($sums) . PHP_EOL;
}
