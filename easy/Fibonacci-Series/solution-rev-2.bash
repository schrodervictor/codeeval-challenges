#!/bin/bash
# Initiates Fibonacci array
FIBONACCI=(0 1 1 2 3 5 8 13 21 34 55)

# Read the input file line by line
for N in $(cat $1); do

    # Do we have the nth number of the sequence?
    if [[ $N -lt ${#FIBONACCI[@]} ]]; then
        echo ${FIBONACCI[$N]}
        continue
    fi

    # If not, we must increase our array
    # With this approach we need to calculate
    # each number just once.

    # How many do we have?
    LEN=${#FIBONACCI[@]}

    # Do it!
    for (( i=LEN-1; i<N; i++)); do
        NEXT=$(( ${FIBONACCI[$i]} + ${FIBONACCI[$i-1]} ))
        FIBONACCI+=($NEXT);
    done

    echo ${FIBONACCI[$N]}
done
