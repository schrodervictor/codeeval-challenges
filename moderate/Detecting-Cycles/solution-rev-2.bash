#!/bin/bash

# Loop through the lines
while read -r -a NUMBERS; do

    # Count how many numbers we have
    LEN=${#NUMBERS[@]}

    # Nested loops. The outher loop pick one number a time
    # and the inner loop compare it with the following number
    # until it finds the first match.
    for (( i=0; i<LEN; i++ )); do
        for (( j=i+1; j<LEN; j++ )); do
            if [[ ${NUMBERS[$i]} == ${NUMBERS[$j]} ]]; then
                # Found the first match. Store it in a variable
                FIRST=${NUMBERS[$i]}
                # and output it without a new line
                echo -n $FIRST
                # Break both loop, we are going to compare the other
                # item in the cycle directly
                break 2
            fi
        done
    done

    (( i++, j++ ))

    # In this while loop the goal is to output the other elements of the
    # cycle. They will be directly outputed as long the values for i and j
    # keys matches and the value for the i key is not equal to the first
    # element, because in this case the it whould be the begining of a
    # new cycle.
    while [[ ${NUMBERS[$i]} == ${NUMBERS[$j]} && ${NUMBERS[$i]} != $FIRST ]]; do
        echo -n " ${NUMBERS[$i]}"
        (( i++, j++ ))
    done

    # Finally, output the line break to start the line for the
    # next iteration
    echo
done < $1

