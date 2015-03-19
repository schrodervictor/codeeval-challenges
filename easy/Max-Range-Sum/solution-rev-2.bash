#!/bin/bash
max_gain_for_n_days() {

    # Define local variables
    local DAYS=$1
    local MAX_GAIN=0
    local SUM=0

    # Shift the first argument (days)
    shift

    # Loop while we have enough data to compose
    # a whole subperiod = days
    while (( $# >= $DAYS )); do

        # Grab the first N gains as a subperiod
        SUBPERIOD=${*:1:$DAYS}
        # Sum the total gain/loss of the subperiod
        SUM=$(( ${SUBPERIOD// /+} ))

        # If we've found a total that is bigger than the current
        # MAX_GAIN, this is the new maximum.
        # Because MAX_GAIN starts with zero, this check also deals
        # with negative sums
        if (( $SUM > $MAX_GAIN )); then
            MAX_GAIN=$SUM
        fi

        # Shift one argument for the next iteration
        shift
    done

    # Output the result
    echo $MAX_GAIN

}


# Loop through the lines. The second part (-n "$LINE") is there to deal with
# files that don't have a new line at the very end of the file (they should)
while read -r LINE || [[ -n "$LINE" ]]; do

    # Grab the information we need
    # Strip out everything from the semicolon inclusive
    DAYS=${LINE%;*}
    # Strip out everything until the semicolon inclusive
    GAINS=${LINE#*;}

    # Call the function we defined
    max_gain_for_n_days $DAYS $GAINS

done < $1
