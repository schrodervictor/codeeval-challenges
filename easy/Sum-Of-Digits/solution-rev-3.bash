#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Initialize the sum variable
    SUM=0

    # Loop through the numbers
    for (( i=${#LINE}-1; $i>=0; i-- )); do
        # Sum them one by one
        SUM=$(( SUM + ${LINE:$i:1} ))
    done

    # Echo the results
    echo $SUM
done < $1

