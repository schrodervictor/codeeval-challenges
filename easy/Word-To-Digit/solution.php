<?php
// Define a simple array mapping words to digits
$numbers = array(
    'zero' => '0',
    'one' => '1',
    'two' => '2',
    'three' => '3',
    'four' => '4',
    'five' => '5',
    'six' => '6',
    'seven' => '7',
    'eight' => '8',
    'nine' => '9',
);

// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Explode the line and remove the line break
    $nums = explode(';', rtrim($line));

    // Convert all elements in the array to correspondent mapping
    $nums = array_map(function($n) use ($numbers) {
        return $numbers[$n];
    }, $nums);

    // Implode the array back and output it
    echo implode('', $nums) . PHP_EOL;
}
fclose($fh);
exit(0);
