<?php
class TextDollar {

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

        $numberGroups = str_split(sprintf('%09d', $number), 3);

        $result = '';

        if(0 < (int)$numberGroups[0]) {
            $result .= self::threeDigitsToText($numberGroups[0]) . 'Million';
        }

        if(0 < (int)$numberGroups[1]) {
            $result .= self::threeDigitsToText($numberGroups[1]) . 'Thousand';
        }

        if(1 < (int)$numberGroups[2] || (1 === (int)$numberGroups[2] && strlen($result) > 0)) {
            $result .= self::threeDigitsToText($numberGroups[2]) . 'Dollars';
        } elseif (1 === (int)$numberGroups[2] && strlen($result) === 0) {
            $result .= self::threeDigitsToText($numberGroups[2]) . 'Dollar';
        }

        if(strlen($result) === 0) {
            $result .= 'ZeroDollars';
        }

        return $result;

    }

    static public function threeDigitsToText($threeDigits) {

        $hundred = $threeDigits[0];
        $tens = $threeDigits[1] . $threeDigits[2];

        $result = '';

        if(0 < (int)$hundred) {
            $result .= self::$units[$hundred] . 'Hundred';
        }

        if(0 === (int)$tens[0] && 0 < (int)$tens[1] && 0 < strlen($result)) {
            $result .= 'And';
        }

        if(0 < (int)$tens) {
            $result .= self::tensToText($tens);
        }

        return $result;

    }

    static public function tensToText($tens) {

        if(0 === (int)$tens[1] && 0 !== (int)$tens[0]) {
            return self::$multiplesOfTen[$tens[0]];
        }

        if(20 > (int)$tens) {
            return self::$units[(int)$tens];
        }

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

