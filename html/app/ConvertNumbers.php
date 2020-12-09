<?php

class ConvertNumbers {
    public static function changeNumber( Numbers $numbers ) {
        for ( $i = $numbers->getStart(); $i <= $numbers->getLimit(); $i++ ) { 
            $response[] = $i;

            foreach ( $numbers->getToExtensiveCases() as $extensiveCase => $changeTo ) {
                if ( ! in_array( false, self::checkCases( $extensiveCase, $i ) ) ) {
                    $response[] = $changeTo;
                }
            }

            $result[] = str_replace( $i . 'AND', '', implode( "AND", $response ) );
            unset( $response );
        }

        return $result;
    }

    public static function checkCases( $extensiveCase, $number ) {
        $multiple[] = $number % (int) $extensiveCase === 0;

        return $multiple;
    }
}
