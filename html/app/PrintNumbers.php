<?php
require_once( 'Numbers.php' );

class PrintNumbers
{
    private $numbers;

    public function __construct( Numbers $numbers )
    {
        $this->numbers = $numbers;
    }

    public function printNumbers() {
        $numbers = $this->numbers->getNumbers();
        foreach ( $numbers as $number ) {
            print $number . ', ';
        }
    }
}
