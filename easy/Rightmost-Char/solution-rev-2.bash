#!/bin/bash

# Loop through the lines
while read -r LINE; do

    # Get the relevant information
    # Everything until the comma
    SEQ=${LINE%,*}
    # And everything after the comma
    CHAR=${LINE#*,}

    # Removes the shortest match from the end of the sequence
    SEQ_TRUNCATED=${SEQ%$CHAR*}

    # Check the result and output it
    if [[ ${#SEQ} == ${#SEQ_TRUNCATED}  ]]; then
        echo -1
    else
        echo ${#SEQ_TRUNCATED}
    fi

done < $1
