#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Make line an array of it's words
    LINE=($LINE)

    # How many words do we have?
    LEN=${#LINE[@]}

    # Echo only the penultimate word
    echo ${LINE[$LEN-2]}

done < $1
