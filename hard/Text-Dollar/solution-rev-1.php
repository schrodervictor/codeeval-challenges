<?php
class TextDollar {

    // Create the static array with the 'units'
    // but also with the numbers from 11 to 19
    static public $units = array(
        1 => 'One',
        'Two',
        'Three',
        'Four',
        'Five',
        'Six',
        'Seven',
        'Eight',
        'Nine',
        11 => 'Eleven',
        'Twelve',
        'Thirteen',
        'Fourteen',
        'Fifteen',
        'Sixteen',
        'Seventeen',
        'Eighteen',
        'Nineteen',
    );

    // Create the static array with the multiples of ten
    static public $multiplesOfTen = array(
        1 => 'Ten',
        'Twenty',
        'Thirty',
        'Forty',
        'Fifty',
        'Sixty',
        'Seventy',
        'Eighty',
        'Ninety',
    );

    static public function toCamelCase($number) {

        // Format the number with nine digits, with all leading zeros
        // and split the string into three groups of three digits
        $numberGroups = str_split(sprintf('%09d', $number), 3);

        // Initialize the output string
        $result = '';

        // Check and build the Million part of the string
        if(0 < (int)$numberGroups[0]) {
            $result .= self::threeDigitsToText($numberGroups[0]) . 'Million';
        }

        // Check and build the Thousand part of the string
        if(0 < (int)$numberGroups[1]) {
            $result .= self::threeDigitsToText($numberGroups[1]) . 'Thousand';
        }

        // Check and build the hundreds, tens and units
        if(0 < (int)$numberGroups[2]
            ||
            // Even when we only have zeros in this part of the string
            // we still need to append 'Dollars' at the end, case something
            // was already outputed before
            (0 === (int)$numberGroups[2] && 0 < strlen($result))
        ) {
            // It'd be simple to check for the singular form for 'Dollar'
            // but the problem requires to use only plural
            $result .= self::threeDigitsToText($numberGroups[2]) . 'Dollars';
        }

        // Apparently this is not neccesary for this problem, but anyway
        if(strlen($result) === 0) {
            $result .= 'ZeroDollars';
        }

        return $result;

    }

    static public function threeDigitsToText($threeDigits) {

        // Divide the digits in the two relevant parts
        $hundred = $threeDigits[0];
        $tens = $threeDigits[1] . $threeDigits[2];

        // Initialize an output string
        $result = '';

        // If we have hundreds, we only need the unit representation
        if(0 < (int)$hundred) {
            $result .= self::$units[$hundred] . 'Hundred';
        }

        // If we have tens, things are more complicated
        if(0 < (int)$tens) {
            $result .= self::tensToText($tens);
        }

        return $result;

    }

    static public function tensToText($tens) {

        // The first thing to check is if this is a multiple of ten
        if(0 === (int)$tens[1] && 0 !== (int)$tens[0]) {
            return self::$multiplesOfTen[$tens[0]];
        }

        // If the number is bellow 20 (but not 10), the treatment is
        // different, because tens and units are combined
        if(20 > (int)$tens) {
            return self::$units[(int)$tens];
        }

        // Default case is to concatenate the tens and units representations
        return self::$multiplesOfTen[$tens[0]] . self::$units[$tens[1]];

    }

}
// Open the file
$fh = fopen($argv[1], "r");

// Loop through the lines
while (($line = fgets($fh)) !== false) {

    // Convert the number and output it
    echo TextDollar::toCamelCase($line) . PHP_EOL;
}

