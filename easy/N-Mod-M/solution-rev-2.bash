#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Grab the numbers from the input
    read -r N M <<< $(IFS=','; echo $LINE)

    # How many M's fits in one N?
    MAX=$(( N / M ))

    # Get the difference
    MOD=$(( N - M * MAX ))

    # Output the result
    echo $MOD

done < $1

