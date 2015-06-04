<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Clean and split the string into an array
    $nums = explode(' ', rtrim($line));

    // Build an array with the frequencies of each number
    // The resulting array will have the following format:
    //     number => frequency
    $freq = array_count_values($nums);

    // Sort the frequency array by it's keys
    ksort($freq);

    // array_search returns the first key found for a certain value
    // if nothing is found, returns false
    $numWinner = array_search(1, $freq);

    if (false === $numWinner) {
        // There was no winner
        echo '0' . PHP_EOL;
    } else {
        // We have a winning number, now we have to know which player
        // has choosen it. We use array search again. In this case it's
        // guaranted to find the number once. We have to sum one, because
        // the game is one-indexed, not zero-indexed like PHP arrays.
        $winner = array_search($numWinner, $nums)+1;

        // Output the result
        echo $winner . PHP_EOL;
    }
}
