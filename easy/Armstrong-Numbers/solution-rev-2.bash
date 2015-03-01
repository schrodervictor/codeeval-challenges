#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Get the line length
    LEN=${#LINE}

    # Initialize a sum variable
    SUM=0

    # Loop through the digits
    for (( i=0; i<LEN; i++ )); do
        # Sum each digit to the power of the length
        SUM=$(( SUM + ${LINE:$i:1}**LEN ))
    done

    # If the sum is equal to the number, it's a Armstrong number
    if [[ "$SUM" -eq "$LINE" ]]; then
        echo 'True'
    else
        echo 'False'
    fi

done < $1
