<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Sanitize the input and explode it into an array
    $numbers = explode(' ', trim($line));

    // Count how many numbers we have
    $len = count($numbers);

    // Nested loops. The outher loop pick one number a time
    // and the inner loop compare it with the following number
    // until it finds the first match.
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($numbers[$i] === $numbers[$j]) {
                // Found a match. This is the first element of the cycle
                echo $numbers[$i];
                // Break both loops. Now we can do simpler stuff to
                // find the next elements of the cycle
                break 2;
            }
        }
    }

    // Create a variable to remember the first element of the cycle
    $first = $numbers[$i];

    // Increment both i and j (they still have the last values of the
    // previous nested loops and, with this, the exact positions from
    // where we'll need to check the other elements)
    $i++; $j++;

    // In this while loop the goal is to output the other elements of the
    // cycle. They will be directly outputed as long the values for i and j
    // keys matches and the value for the i key is not equal to the first
    // element, because in this case the it whould be the begining of a
    // new cycle.
    while ($numbers[$i] === $numbers[$j] && $numbers[$i] !== $first) {
        echo ' ' . $numbers[$i];
        $i++; $j++;
    }

    // Finally, output the line break to start the line for the
    // next iteration
    echo PHP_EOL;
}
