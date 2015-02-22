#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Convert the line string to an array of words
    LINE=($LINE)

    # Echo the array, capitalizing the first
    # letter of each element
    echo "${LINE[*]^}"

done < $1

