<?php
require_once( 'PrintNumbers.php' );

$printNumbers = new PrintNumbers( 1, 100, array(
    '5' => 'Five',
    '3' => 'Three',
) );

$printNumbers->printNumbers();
