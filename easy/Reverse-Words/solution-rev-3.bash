#!/bin/bash
while read LINE; do
    WORDS=($LINE)
    WORDSLEN=${#WORDS[*]}
    for (( i=$WORDSLEN-1; i>=0; i-- )); do
        echo -n ${WORDS[$i]}
        if [[ $i -ne 0  ]]; then
            echo -n ' '
        fi
    done
    echo ''
done < $1
