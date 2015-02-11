<?php
// Set an initial primes array
$primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29);

// Array with all odd numbers from 31 to 999
$numbers = range(21, 999, 2);

// Lets filter all the primes
// We are passing the primes array by reference,
// because we want to add new elements to it.
$numbers = array_filter($numbers, function ($num) use (&$primes) {

    // Start assuming that everything is a prime
    $is_prime = true;

    // Loop through the primes we already have
    foreach ($primes as $prime) {

        // If it is divisible by a prime, then it's not a prime
        if(0 === $num % $prime) {
            $is_prime = false;
            break;
        }
    }

    // If it passed through the previous loop without any
    // perfec division, we've found a prime.
    // Add it to the primes array.
    if($is_prime) {
        $primes[] = $num;
    }

    return $is_prime;
});

// Reverse the array, we want the larger elements
$numbers = array_reverse($numbers);

// Loop, begging from the largest ones
foreach ($numbers as $number) {

    // Cast to string
    $num = (string)$number;

    // We already expect that the answer will have three
    // digits, so all we have to do is to compare the
    // first with the last
    if(strlen($num) === 3 && $num[0] === $num[2]) {

        // Found the solution, echo it.
        echo $num;
        exit(0);
    }
}

// If we didn't find anything, exit with error
exit(1);
