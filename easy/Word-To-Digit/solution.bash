#!/bin/bash

echo_digits() {
    # for each word passed to this function
    # run a case match. It's a little bit ugly
    # but is easy to read and much faster than
    # using an array
    for WORD in $@; do

        # All output in this case clause happens
        # without newlines, to concatenate the result
        case $WORD in
            zero ) echo -n 0
            ;;
            one ) echo -n 1
            ;;
            two ) echo -n 2
            ;;
            three ) echo -n 3
            ;;
            four ) echo -n 4
            ;;
            five ) echo -n 5
            ;;
            six ) echo -n 6
            ;;
            seven ) echo -n 7
            ;;
            eight ) echo -n 8
            ;;
            nine ) echo -n 9
            ;;
        esac
    done
}

# Loop through the lines
while read -r LINE; do

    # Call the function, expanding the input replacing
    # all semicolons to spaces (this way each word becomes
    # a separate argument)
    echo_digits ${LINE//;/ }

    # Echo a new line
    echo
done < $1
