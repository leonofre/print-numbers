<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class PrintNumbersTest extends TestCase
{
    public function testCanBePrintNumbersFrom1To100(): void
    {
        $this->assertInstanceOf(
            PrintNumbers::class,
            PrintNumbers::defineRange( 1, 10 )
        );
    }

}