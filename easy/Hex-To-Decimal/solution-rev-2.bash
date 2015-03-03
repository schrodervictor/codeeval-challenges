#!/bin/bash
# Loop through the lines
while read -r LINE; do
    # Output the number converted to base 10
    echo $(( 0x${LINE} ))
done < $1
