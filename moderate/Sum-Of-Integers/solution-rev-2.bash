#!/bin/bash
# Loop through the lines
while read -r LINE; do

    # Explode the line
    read -a NUMBERS <<< $(IFS=','; echo $LINE)

    # Grab the amout of values we have to analyze
    LEN=${#NUMBERS[@]}

    # Edge case: if we have only one number, it is the answer
    if [[ $LEN -eq 1 ]]; then
        echo ${NUMBERS[0]}
        continue
    fi

    # Initialize the MAX_SUM variable
    MAX_SUM=''

    # Begin to walk the array
    for (( i=0; i<LEN; i++ )); do
        # For each element, calculate all the possible sums
        # from itself until the last, them until one before the last
        # and so on
        for (( j=1; j<=LEN-i; j++ )); do
            SUM=${NUMBERS[@]:$i:$j}
            SUM=$(( ${SUM// /+} ))
            # Keep the calculation only if greater than what we already have
            if [[ -z $MAX_SUM || $SUM -gt $MAX_SUM ]]; then
                MAX_SUM=$SUM
            fi
        done
    done

    # Echo the greatest value calculated
    echo $MAX_SUM
done < $1
