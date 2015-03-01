<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Sanitize the line
    $line = trim($line);

    // Get the line length
    $len = strlen($line);

    // Build an array with the digits
    $digits = str_split($line);

    // Initializu a sum variable
    $sum = 0;

    // Loop through the digits
    foreach ($digits as $digit) {
        // Sum each digit to the power of the length
        $sum += pow($digit, $len);
    }

    // If the sum is equal to the number, it's a Armstrong number
    if ($sum === (int)$line) {
        echo 'True' . PHP_EOL;
    } else {
        echo 'False' . PHP_EOL;
    }

}
