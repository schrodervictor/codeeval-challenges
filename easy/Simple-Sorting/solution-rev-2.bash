#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Sort the numbers and put them in an array
    NUMBERS=($(for WORD in $LINE; do echo $WORD; done | sort -n))

    # Output the array
    echo "${NUMBERS[@]}"

done < $1

