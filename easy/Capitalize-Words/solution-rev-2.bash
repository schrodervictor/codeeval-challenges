#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Initialize an empty array
    SENTENCE=()

    # Loop through the words
    for WORD in $LINE; do
        # Capitalize the first letter and append it to the array
        SENTENCE+=("${WORD^}")
    done

    # Echo the result
    echo "${SENTENCE[*]}"

done < $1
