<?php
// Open the input file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($line = fgets($fh))) {

    // Grab the data we need
    list($days, $gains) = explode(';', rtrim($line));

    // Convert everything to integers, for performance
    $days = (int)$days;

    // Explode the gains into an array and convert
    // everything to integers, for performance
    $gains = array_map(
        function($element) { return (int)$element; },
        explode(' ', $gains)
    );

    // Initialize the result variable
    $result = 0;

    // Check how many combinations we have
    $combinations = count($gains) - $days;

    // Loop through the combinations
    for($i = 0; $i <= $combinations; $i++) {
        // Calculate the sum for each combination
        $sum = array_sum(array_slice($gains, $i, $days));
        // If we've found a bigger result, keep it
        // Because result start with zero, this handles negative sums
        if ($sum > $result) $result = $sum;
    }

    // Echo the result
    echo $result . PHP_EOL;
}
fclose($fh);
exit(0);

