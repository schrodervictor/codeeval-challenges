#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Grabbing all the elements we need
    read -r NUM P1 P2 <<< $(IFS=','; echo $LINE)

    # Adjusting the indexes, because they are given
    # as 1-based positions
    (( P1-- ))
    (( P2-- ))

    # Getting the reverse binary representation of the number
    REV_BINARY=$(echo "obase=2;$NUM" | bc | rev)

    # Comparing the bits and echoing the result
    if [[ "${REV_BINARY:${P1}:1}" -eq "${REV_BINARY:${P2}:1}" ]];then
        echo true
    else
        echo false
    fi

done < $1
