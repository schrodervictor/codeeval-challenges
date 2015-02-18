#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Explode the numbers in the line
    read -a NUMBERS <<< $(IFS=','; echo $LINE)

    SOLUTION=()

    for N in ${NUMBERS[@]}; do
        if [[ ! " ${SOLUTION[@]} " =~ " $N " ]]; then
            SOLUTION+=($N)
        fi
    done

    # Flat the string. Now the numbers are separate by spaces
    SOLUTION=$(echo ${SOLUTION[@]})

    # Echo the result, replacing spaces by commas
    echo ${SOLUTION// /,}

done < $1
