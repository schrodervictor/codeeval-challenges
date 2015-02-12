#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Get all the elements we need
    read -r FIZZ BUZZ NUM <<< $(IFS=' ' echo $LINE)

    # Loop the numbers
    for (( i=1; i<=NUM; i++)); do

        # If it's divisible by $a is Fuzz
        MOD_FIZZ=$(( i % FIZZ ))

        if [[ MOD_FIZZ -eq 0 ]]; then
            echo -n F
        fi

        # If it's divisible by $b is Buzz
        MOD_BUZZ=$(( i % BUZZ ))

        if [[ MOD_BUZZ -eq 0 ]]; then
            echo -n B
        fi

        # If it's not divisible by Fizz nor Buzz, is a number
        if [[ MOD_FIZZ -ne 0 && MOD_BUZZ -ne 0 ]]; then
            echo -n "$i"
        fi

        # Output the following space or new line
        if [[ $i -eq $NUM ]]; then
            echo
        else
            echo -n ' '
        fi

    done
done < $1
