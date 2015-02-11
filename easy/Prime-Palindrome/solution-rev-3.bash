#!/bin/bash

# Set an initial primes array
PRIMES=(2 3 5 7 11 13 17 19 23 29)

# The number from where we start to iterate
NUM=29

# The number of primes we have
NPRIMES=${#PRIMES[@]}

# Let's loop until 999, because 1000 is already excluded
while [[ NUM -lt 999 ]]; do

    # Go to the next number, skipping evens
    (( NUM+=2 ))

    # Test it against all primes we have
    # We are starting from 1 (instead of 0) because we
    # are only testing odd numbers (don't need to test %2)
    for (( i=1; i<NPRIMES; i++ )); do
        if [[ $(( $NUM % ${PRIMES[$i]} )) -eq 0 ]]; then
            continue 2
        fi
    done

    # If we've found a prime, add it to the array
    # and increase the counter
    PRIMES+=($NUM)
    (( NPRIMES++ ))

done

# Lets loop through the primes, beggining from the biggest number
for (( i=NPRIMES-1; i>=0; i-- )); do

    # We already expect that the result will have three
    # digits, so all we have to do is to check if the first
    # digit is equal to the last
    if [[ ${PRIMES[$i]:0:1} -eq ${PRIMES[$i]:2:1} ]]; then

        # Found the solution, echo it and exit with success
        echo "${PRIMES[$i]}"
        exit 0
    fi
done

# If we didn't find anything, then exit with error
exit 1
