<?php
// Open the input file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (false !== ($test = fgets($fh))) {

    // The line already has the line break
    echo strtolower($test);
}
fclose($fh);
exit(0);
