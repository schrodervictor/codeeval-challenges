#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Get the size of the string
    LEN=${#LINE}

    # Declare an associative array
    declare -A COUNT

    # Count how many times each digit appears
    for (( i=0; i<LEN; i++ )); do
        (( COUNT[${LINE:$i:1}]++ ))
    done

    # We start assuming that every number is self describing
    IS_SELF_DESCRIBING=1

    # Loop through the digits
    # 'i' denotes the digit that may appear in the string
    # 'FREQUENCY' show how many times it is expected the digit to appear
    for (( i=0; i<LEN; i++ )); do

        FREQUENCY=${LINE:$i:1}

        # If the expected frequency is different from the actual
        # count, then it isn't a self describing number.
        if [[ $FREQUENCY -ne ${COUNT[$i]} ]]; then

            # Flag the result
            IS_SELF_DESCRIBING=0

            # Exit the loop, nothing to do here anymore
            break
        fi
    done

    # Output the result
    echo $IS_SELF_DESCRIBING

    # Clean up for the next iteration
    unset COUNT

done < $1

