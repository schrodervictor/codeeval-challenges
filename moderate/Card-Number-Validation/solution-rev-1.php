<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Sanitize the input
    $line = str_replace(' ', '', trim($line));

    // Check and store how many numbers we have
    $len = strlen($line);

    // If we have less than 12 or more than 19 numbers,
    // the entry is not valid
    if ($len < 12 || $len > 19) {
        echo 0 . PHP_EOL;
        continue;
    }

    // Reverse the line (it'll easier to work)
    $revLine = strrev($line);

    // Initialize the sum variable
    $sum = 0;

    // Even indices are simply summed
    for ($i = 0; $i < $len; $i+=2) {
        $sum += (int)$revLine[$i];
    }

    // Odd indices are doubled and, if results in a number
    // greater than 9, it's digits are summed
    for ($i = 1; $i < $len; $i+=2) {
        $double = (int)$revLine[$i] * 2;
        if ($double > 9) {
            // Mod 9 does the trick to sum the digits,
            // but we have to subtract one before and
            // add again after to make it work with the
            // double of 9 itself (18%9 would be 0)
            $sum += (($double - 1) % 9) + 1;
        } else {
            $sum += $double;
        }
    }

    // If this operation results in something divisible by 10
    // return true (1), otherwise return false (0)
    echo ($sum % 10 === 0 ? 1 : 0) . PHP_EOL;
}
