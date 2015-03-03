var fs  = require("fs");

// Define the callback function
function processInput(err, data) {

    if(err) throw err;

    data.toString().split('\n').forEach(function (line) {

        // If the line is blank, do nothing
        if(line === '') return;

        // Output the number converted to base 10
        console.log(parseInt('0x' + line));
    });
}

// Open the file and process each line
fs.readFile(process.argv[2], processInput);

