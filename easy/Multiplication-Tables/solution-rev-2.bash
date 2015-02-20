#!/bin/bash
# Basic loop from 1 to 12
for i in {1..12}; do
    # Nested loop with the same size
    for j in {1..12}; do
        # Output the result, with attention for the amount of digits
        printf "%4d" $(( i*j ))
    done
    # and a line break at the end of each line
    echo
done

