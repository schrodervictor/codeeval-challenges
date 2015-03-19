#!/bin/bash

# Loop through the lines
while read -r LINE; do
    echo "${LINE##* ${LINE##* } }"
done < $1

