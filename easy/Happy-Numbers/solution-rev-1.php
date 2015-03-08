<?php

// Initialize array for happy and unhappy numbers
// to cache the previous operations
$unhappyNumbers = array(0);
$happyNumbers = array(1);

// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Cast the line to integer
    $num = (int)$line;

    // This array will save the previous calculations
    // in order to check if the number is happy or not
    $previousNumbers = array();

    // Enter in indeterminated loop
    while(true) {

        // Check if the current number is in the happy numbers array
        if (in_array($num, $happyNumbers)) {

            // If so, output the answer
            echo '1' . PHP_EOL;

            // This number and everything during the calculation
            // are happy numbers
            array_merge($happyNumbers, $previousNumbers);

            // Terminate the loop
            break;
        }

        // Check if the current number is in the unhappy numbers array ...
        if (in_array($num, $previousNumbers)
            || // Or in the previous steps of this loop
            in_array($num, $unhappyNumbers)
        ) {
            // If this is the case, output the result
            echo '0' . PHP_EOL;

            // This number and everything that happened during this
            // calculation are unhappy numbers
            $unhappyNumbers = array_merge($unhappyNumbers, $previousNumbers);

            // Terminate the loop
            break;
        }

        // If the current number passed through the previous checks and
        // we are here, we still in undetermined state.
        // Need to calculate the next step.
        $sum = 0;

        // Sum the square of each digit
        foreach (str_split((string)$num) as $n) {
            $sum += pow((int)$n, 2);
        }

        // Put the current number in the previous calculations
        // until we find if it is also an happy number or not
        $previousNumbers[] = $num;

        // The sum becomes the number for the next iteration
        $num = $sum;
    }
}
