#!/bin/bash

# Define an empty array to sort the lines
declare -a SORTED_LINES

# Define a flag to capture the first line
IS_FIRST=1

# Loop through the lines
while read -r LINE; do

    # Check if we need to capture the value of the first line
    if [[ "$IS_FIRST" -eq 1 ]]; then
        # Get the number of lines we need for the output
        NUM_LINES="$LINE"
        # Modify the flag value for the first line
        IS_FIRST=0
        # Call the next iteration
        continue
    fi

    # Using an array to sort the lines by length
    if [[ -z "$SORTED_LINES[${#LINE}]" ]]; then
        # If the index for this length is not yet defined,
        # just put the line there
        SORTED_LINES[${#LINE}]="$LINE"
    else
        # If the index is already defined, we have two (or more)
        # lines with the same length. Append the line to whatever
        # we already have there
        SORTED_LINES[${#LINE}]="${SORTED_LINES[${#LINE}]}\n$LINE"
    fi

done < $1

# Output the result, reversing the order and limiting
# the number of lines to the requested amount.
echo -e "${SORTED_LINES[@]}" | tac | head -n $NUM_LINES
