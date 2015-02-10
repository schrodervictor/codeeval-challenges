<?php
// Set an initial primes array
$primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29);

// The initial amount of primes we have
$res = 10;

// The number from where we start to iterate
$num = 31;

// Let's loop until we have 1000 elements
while($res<1000) {

    // Start assuming that everything is a prime number
    $is_prime = true;

    // Test it against all primes we have
    foreach ($primes as $prime) {
        if(0 === ($num % $prime)) {
            $is_prime = false;
            break;
        }
    }

    // If we've found a prime, add it to the array
    // and increase the counter
    if($is_prime) {
        array_push($primes, $num);
        $res++;
    }

    // Go to the next number, skipping evens
    $num += 2;
}

// Sum the array and output the result
echo array_sum($primes);
exit(0);
