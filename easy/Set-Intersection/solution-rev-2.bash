#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Separate the lists
    read -r LIST1 LIST2 <<< $(IFS=';'; echo $LINE)

    # Generate the arrays
    LIST1=${LIST1//,/ }
    LIST2=${LIST2//,/ }

    # Initialize an empty array
    INTERSECTION=()

    # Loop through the elements of the first list and find
    # those that are present in both
    for i in $LIST1; do
        # The spaces here are important!
        if [[ " $LIST2 " =~ " $i " ]]; then
            INTERSECTION+=($i)
        fi
    done

    # Flat the array
    INTERSECTION="${INTERSECTION[@]}"

    # Echo the result, replacing spaces by commas
    echo "${INTERSECTION// /,}"
done < $1

