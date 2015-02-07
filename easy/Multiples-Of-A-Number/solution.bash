#!/bin/bash
for line in $(cat $1); do
    read -r A B <<< $(IFS=','; echo $line)
    RESULT=$B
    while [[ RESULT -lt A ]]; do
        RESULT=$(( $RESULT+$B ))
    done
    echo $RESULT
done
