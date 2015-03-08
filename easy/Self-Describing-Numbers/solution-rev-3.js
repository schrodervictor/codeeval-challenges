var fs  = require("fs");

// Define the callback function
function processInput(err, data) {

    if(err) throw err;

    data.toString().split('\n').forEach(function (line) {

        // If the line is blank, do nothing
        if(line === '') return;

        var count = new Array();

        // Count how many times each digit appears
        line.split('').forEach(function(character) {
            count[character] ? count[character]++ : count[character] = 1;
        });

        // Get the line length
        var lineLen = line.length;

        // We start assuming that every number is self describing
        var isSelfDescribingNum = true;

        // Loop through the digits
        // 'index' denotes the digit that may appear in the string
        // 'frequency' show how many times it is expected the digit to appear
        for (var index=0; index<lineLen; index++) {

            var frequency = parseInt(line[index]);

            // If the expected frequency is different from the actual
            // count, then it isn't a self describing number.
            // Careful with something that may not be in the count array
            if(frequency !== ((typeof count[index] !== 'undefined') ? count[index] : 0)) {

                // Flag the result
                isSelfDescribingNum = false;

                // Exit the loop, nothing to do here anymore
                break;
            }
        }

        // Check and output the result
        if (isSelfDescribingNum) {
            console.log('1');
        } else {
            console.log('0');
        }

    });
}

// Open the file and process each line
fs.readFile(process.argv[2], processInput);
