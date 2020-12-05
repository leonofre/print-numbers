<?php
use PHPUnit\Framework\TestCase;

final class PrintNumbersTest extends TestCase
{
    public function testCanBePrintNumbers()
    {
        $printNumbers = new PrintNumbers( 1, 10, array(
            '3' => 'Three',
            '5' => 'Five',
        ));

        $this->assertInstanceOf(
            PrintNumbers::class,
            $printNumbers
        );

        return $printNumbers;
    }

    public function testCanBePrintNumbersFrom1To100(): void
    {
        $this->assertInstanceOf(
            PrintNumbers::class,
            PrintNumbers::defineRange( 1, 10 )
        );
    }

}