#!/bin/bash

# Capturing the output in an array
OUTPUT=($(wc -c "$1"))

# OUTPUT looks like this:
# 55 input.txt

# Echo only the requested information
echo "${OUTPUT[0]}"
