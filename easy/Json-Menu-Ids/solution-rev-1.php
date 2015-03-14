<?php
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // If is a empty line, skip it
    if('' === trim($line)) continue;

    // Decode the JSON object
    $json = json_decode($line);

    // Initialize the sum variable
    $sum = 0;

    // Loop through all the menu items
    foreach($json->menu->items as $item) {
        // Check for the existance of a label and
        // case positive, sum the id
        if(isset($item->label)) $sum += $item->id;
    }

    // Output the result
    echo $sum . PHP_EOL;

}
