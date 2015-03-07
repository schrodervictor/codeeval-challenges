var fs  = require("fs");

// Define the callback function
function processInput(err, data) {

    if(err) throw err;

    data.toString().split('\n').forEach(function (line) {

        // If the line is blank, do nothing
        if(line === '') return;

        // Split the line
        line  = line.split(',');

        // Name the variables
        var N = line[0];
        var M = line[1];

        // How many M's fits in one N?
        var max = Math.floor(N/M);

        // Calculate the modulo
        var mod = N - max*M;

        // Output the answer
        console.log(mod);

    });
}

// Open the file and process each line
fs.readFile(process.argv[2], processInput);

