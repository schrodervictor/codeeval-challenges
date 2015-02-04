<?php
// Open the input file
$fh = fopen($argv[1], "r");

// It's kind of cheating, but it seems legit
// given the problem scope.
$fibonacci = array(0,1,1,2,3,5,8,13,21,34,55);

// Loop through the lines
while (false !== ($test = fgets($fh))) {

    $n = (int)rtrim($test);

    // Do we have the nth number of the sequence?
    if(isset($fibonacci[$n])) {
        echo $fibonacci[$n] . PHP_EOL;
        continue;
    }

    // If not, we must increase our array
    // With this approach we need to calculate
    // each number just once.

    // How many do we have?
    $last = count($fibonacci) - 1;

    // How many are missing?
    $diff = $n - $last;

    // Do it!
    for ($i = 0; $i < $diff; $i++) {
        $fibonacci[] = $fibonacci[$last + $i] + $fibonacci[$last + $i -1];
    }

    echo $fibonacci[$n] . PHP_EOL;
}
fclose($fh);
exit(0);
