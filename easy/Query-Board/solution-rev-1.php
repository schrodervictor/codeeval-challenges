<?php
class QueryBoard {
    protected $board = array();
    protected $size;

    public function __construct($size = 256) {
        $this->size = $size;
    }

    public function actionSetRow($args) {
        $row = (int)$args[0];
        $value = (int)$args[1];
        $this->board[$row] = array_fill(0, $this->size, $value);
    }

    public function actionSetCol($args) {
        $col = (int)$args[0];
        $value = (int)$args[1];

        for ($i = 0; $i < $this->size; $i ++) {
            if (!isset($this->board[$i])) {
                $this->board[$i] = array();
            }
            $this->board[$i][$col] = $value;
        }
    }

    public function actionQueryRow($args) {
        $row = (int)$args[0];
        if (!isset($this->board[$row])) {
            echo '0' . PHP_EOL;
            return;
        }
        echo array_sum($this->board[$row]) . PHP_EOL;
    }

    public function actionQueryCol($args) {
        $col = (int)$args[0];
        echo array_reduce($this->board,
            function($carry, $row) use ($col) {
                $carry += (isset($row[$col]) ? $row[$col] : 0);
                return $carry;
            },
            0) . PHP_EOL;
    }
}


$Board = new QueryBoard();

$fh = fopen($argv[1], "r");
while (($line = fgets($fh)) !== false) {

    $args = explode(' ', trim($line));

    $method = array_shift($args);

    $Board->{'action' . $method}($args);

}
