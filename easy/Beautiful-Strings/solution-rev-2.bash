#!/bin/bash
# Loop through the lines
while read -r LINE; do

    # Remove everything from the string that doesn't matter
    LINE=${LINE//[^[:alpha:]]}

    # To lowercase
    LINE=${LINE,,}

    # Check the number of chars we have
    CHARS=${#LINE}

    # Declare an associative array for letter frequencies
    declare -A FREQUENCIES

    # Count the frequency of each letter
    for ((i=0; i<CHARS; i++)); do
        (( FREQUENCIES[${LINE:$i:1}]++ ))
    done

    # Sort the frequency array
    FREQUENCIES_SORTED=($(IFS=$'\n'; echo "${FREQUENCIES[*]}" | sort -nr))

    # Initialize the result variable
    RESULT=0

    # Initialize the beauty variable with the maximum possible value
    # it'll be decremented by one each time it's used
    BEAUTY=26

    # Loop through the frequencies (higher to lower)
    for FREQUENCY in ${FREQUENCIES_SORTED[@]}; do

        # Add the "beauty" factor to the result
        # and decrement the beauty variable
        RESULT=$(( RESULT + FREQUENCY*(BEAUTY--) ))

    done

    # Output the result
    echo $RESULT

    # Unset the frequencies array for the next iteration
    unset FREQUENCIES

done < $1

