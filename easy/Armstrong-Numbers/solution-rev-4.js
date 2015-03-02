var fs  = require("fs");

// Define the callback function
function processInput(err, data) {

    if(err) throw err;

    data.toString().split('\n').forEach(function (line) {

        // If the line is blank, do nothing
        if(line === '') return;

        // Get the line length
        var len = line.length;

        // Initialize a sum variable
        var sum = 0;

        // Loop through the digits
        for(var i=0; i<len; i++) {
            // Sum each digit to the power of the length
            sum += Math.pow(line[i], len);
        }

        // If the sum is equal to the number, it's a Armstrong number
        if (sum == line) {
            console.log('True');
        } else {
            console.log('False');
        }

    });
}

// Open the file and process each line
fs.readFile(process.argv[2], processInput);


