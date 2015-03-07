<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Sanitize the input
    $line = trim($line);

    // Make it an array of digits
    $nums = str_split($line);

    // Count how many times each digit appears
    $count = array_count_values($nums);

    // We start assuming that every number is self describing
    $isSelfDescribingNum = true;

    // Loop through the digits
    // $digit denotes the digit that may appear in the string
    // $frequency show hom many times it is expected the digit to appear
    foreach ($nums as $digit => $frequency) {

        // If the expected frequency is different from the actual
        // count, then it isn't a self describing number.
        // Careful with something that may not be in the count array
        if($frequency != (isset($count[$digit]) ? $count[$digit] : 0)) {

            // Flag the result
            $isSelfDescribingNum = false;

            // Exit the loop, nothing to do here anymore
            break;
        }
    }

    // Check and output the result
    if ($isSelfDescribingNum) {
        echo '1' . PHP_EOL;
    } else {
        echo '0' . PHP_EOL;
    }


}
