<?php
use PHPUnit\Framework\TestCase;

final class PrintNumbersTest extends TestCase
{
    /**
     * @dataProvider printNumbersProvider
     */
    public function testCanBeUsePrintNumbers( PrintNumbers $printNumbers ) {
        $this->assertInstanceOf(
            PrintNumbers::class,
            $printNumbers
        );
    }

    /**
     * @dataProvider printNumbersProvider
     */
    public function testNotEmpty( PrintNumbers $printNumbers ) {

        $this->assertNotEmpty( $printNumbers->getNumbers() );

        return $numbers_to_print;
    }

    /**
     * @dataProvider printNumbersProvider
     */
    public function testArrayContent( PrintNumbers $printNumbers, array $numbers ) {
        $numbers_to_print = $printNumbers->getNumbers();
        $this->assertEquals( $numbers, $numbers_to_print );
    }

    /**
     * @dataProvider printNumbersProvider
     */
    public function testPrintNumbers( PrintNumbers $printNumbers, array $numbers, string $print ) {
        $this->expectOutputString( $print );
        $printNumbers->printNumbers();
    }

    public function printNumbersProvider() {
        $test_cases = [
            [
                'start' => 1,
                'limit' => 20,
                'cases' => [
                    '2' => 'Two',
                    '5' => 'Five',
                ]
            ],
            [
                'start' => 10,
                'limit' => 50,
                'cases' => [
                    '3' => 'Three',
                    '5' => 'Five',
                    '4' => 'Four',
                ]
            ],
            [
                'start' => 1,
                'limit' => 100,
                'cases' => [
                    '3' => 'Three',
                    '5' => 'Five',
                ]
            ]
        ];
        $provider_return = [];

        foreach( $test_cases as $key => $test_case ) {
            for ( $i = $test_case['start']; $i <= $test_case['limit']; $i++ ) {
                $change = [];
                ksort( $test_case['cases'] );

                foreach ( $test_case['cases'] as $number => $to_change ) {
                    if ( $i % $number === 0 ) {
                        $change[] = $to_change;
                    }
                }

                if ( count( $change ) > 0 ) {
                    $test_cases[ $key ]['array_numbers'][] = implode( 'AND', $change );
                    $test_cases[ $key ]['string_numbers']  .= implode( 'AND', $change ) . ', ';
                } else {
                    $test_cases[ $key ]['array_numbers'][] = strval( $i );
                    $test_cases[ $key ]['string_numbers']  .= $i . ', ';
                }
                
            }
        }



        return [
            [
                new PrintNumbers( $test_cases[0]['start'], $test_cases[0]['limit'], $test_cases[0]['cases'] ),
                $test_cases[0]['array_numbers'],
                $test_cases[0]['string_numbers']
            ],
            [
                new PrintNumbers( $test_cases[1]['start'], $test_cases[1]['limit'], $test_cases[1]['cases'] ),
                $test_cases[1]['array_numbers'],
                $test_cases[1]['string_numbers']
            ],
            [
                new PrintNumbers( $test_cases[2]['start'], $test_cases[2]['limit'], $test_cases[2]['cases'] ),
                $test_cases[2]['array_numbers'],
                $test_cases[2]['string_numbers']
            ]
        ];
    }
}