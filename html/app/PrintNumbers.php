<?php

class PrintNumbers
{
    private $start;
    private $limit;
    private $toExtensiveCases;

    public function __construct( int $start, int $limit, array $toExtensiveCases )
    {
        ksort( $toExtensiveCases );

        $this->start = $start;
        $this->limit = $limit;
        $this->toExtensiveCases = $toExtensiveCases;
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

    private function checkCases( $extensiveCases, $number ) {
        $multiple[] = $number % (int) $extensiveCases === 0;

        return $multiple;
    }

    public function printNumbers() {
        for ( $i = $this->start; $i <= $this->limit; $i++ ) { 
            print $this->getNumber( $i );
            print '<br>';
        }
    }
}
