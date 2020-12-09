<?php
require_once( 'ConvertNumbers.php' );
require_once( 'PrintNumbers.php' );

$numbers = new Numbers( 1, 100, array(
    '5' => 'Five',
    '3' => 'Three',
) );

$numbers->setNumbers( ConvertNumbers::changeNumber( $numbers ) );

$printNumbers = new PrintNumbers( $numbers );
$printNumbers->printNumbers();
