#!/bin/bash

# Initialize arrays for happy and unhappy numbers
# to cache the previous operations
UNHAPPY_NUMBERS=(0)
HAPPY_NUMBERS=(1)

# Loop through the lines
while read -r NUM; do

    # This array will save the previous calculations
    # in order to check if the number is happy or not
    PREVIOUS_NUMBERS=()

    # Enter in indeterminated loop
    while true; do

        # Check if the current number is in the happy numbers array
        if [[ " ${HAPPY_NUMBERS[@]} " =~ " $NUM " ]]; then

            # If so, output the answer
            echo 1

            # This number and everything during the calculation
            # are happy numbers
            HAPPY_NUMBERS=("${HAPPY_NUMBERS[@]}" "${PREVIOUS_NUMBERS[@]}")

            # Terminate the loop
            break
        fi

        # Check if the current number is in the unhappy numbers array ...
        if [[ " ${UNHAPPY_NUMBERS[@]} " =~ " $NUM "
              || # Or in the previous steps of this loop
              " ${PREVIOUS_NUMBERS[@]} " =~ " $NUM "
        ]]; then

            # If this is the case, output the result
            echo 0

            # This number and everything that happened during this
            # calculation are unhappy numbers
            UNHAPPY_NUMBERS=("${UNHAPPY_NUMBERS[@]}" "${PREVIOUS_NUMBERS[@]}")

            # Terminate the loop
            break
        fi

        # If the current number passed through the previous checks and
        # we are here, we still in undetermined state.
        # Need to calculate the next step.

        # Initialize the SUM variable
        SUM=0

        # Check the NUM length
        LEN=${#NUM}

        # Sum the square of each digit
        for (( i=0; i<LEN; i++ )); do
            SUM=$(( SUM + ${NUM:$i:1}**2 ))
        done

        # Put the current number in the previous calculations
        # until we find if it is also an happy number or not
        PREVIOUS_NUMBERS+=($NUM)

        # The sum becomes the number for the next iteration
        NUM=$SUM;
    done
done < $1

