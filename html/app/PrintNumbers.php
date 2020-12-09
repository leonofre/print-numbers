<?php

class PrintNumbers
{
    private $start;
    private $limit;
    private $numbers;
    private $toExtensiveCases;

    public function __construct( int $start, int $limit, array $toExtensiveCases )
    {
        ksort( $toExtensiveCases );

        $this->start = $start;
        $this->limit = $limit;
        $this->toExtensiveCases = $toExtensiveCases;

        $this->setNumbers();
    }

    private function getNumber( $number ) {
        $response[] = $number;

        foreach ( $this->toExtensiveCases as $extensiveCase => $changeTo ) {
            if ( ! in_array( false, $this->checkCases( $extensiveCase, $number ) ) ) {
                $response[] = $changeTo;
            }

        }

        return str_replace( $number . 'AND', '', implode( "AND", $response ) );
    }

    private function checkCases( $extensiveCase, $number ) {
        $multiple[] = $number % (int) $extensiveCase === 0;

        return $multiple;
    }

    private function setNumbers() {
        for ( $i = $this->start; $i <= $this->limit; $i++ ) { 
            $this->numbers[] = $this->getNumber( $i );
        }
    }

    public function getNumbers() {
        return $this->numbers;
    }

    public function printNumbers() {
        $numbers = $this->getNumbers();
        foreach ( $numbers as $number ) {
            print $number . ', ';
        }
    }
}
