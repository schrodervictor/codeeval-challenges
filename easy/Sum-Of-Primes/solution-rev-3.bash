#!/bin/bash

# Set an initial primes array
PRIMES=(2 3 5 7 11 13 17 19 23 29)

# The initial amount of primes we have
NPRIMES=10

# Initial sum of primes
SUM=129

# The number from where we start to iterate
NUM=29

# Let's loop until we have 1000 elements
while [[ NPRIMES -lt 1000 ]]; do

    # Go to the next number, skipping evens
    (( NUM+=2 ))

    MAX_TEST=$(( NUM / 2 ))
    # Test it against all primes we have
    # We are starting from 1 (instead of 0) because we
    # are only testing odd numbers (don't need to test %2)
    for (( i=1; i<NPRIMES && MAX_TEST>${PRIMES[$i]}; i++ )); do
        if [[ $(( $NUM % ${PRIMES[$i]} )) -eq 0 ]]; then
            continue 2
        fi
    done

    # If we've found a prime, add it to the array
    # and increase the counter
    PRIMES+=($NUM)
    (( NPRIMES++ ))
    (( SUM+=NUM ))

done

# Echo the result
echo "$SUM"
