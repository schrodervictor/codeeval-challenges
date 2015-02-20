<?php
// Basic loop from 1 to 12
for($i = 1; $i <= 12; $i++) {
    // Nested loop with the same size
    for ($j = 1; $j <=12; $j++) {
        // Output the result, with attention for the amount of digits
        echo sprintf("%4d", $i*$j);
    }
    // and a line break at the end of each line
    echo PHP_EOL;
}
