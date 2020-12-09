<?php
use PHPUnit\Framework\TestCase;

final class PrintNumbersTest extends TestCase
{
    private $test_cases = [
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
    public function testNotEmpty( PrintNumbers $printNumbers, Numbers $numbers ) {

        $this->assertNotEmpty( $numbers->getNumbers() );
    }

    /**
     * @dataProvider printNumbersProvider
     */
    public function testArrayContent( PrintNumbers $printNumbers, Numbers $numbers, array $number_list ) {
        $numbers_to_print = $numbers->getNumbers();
        $this->assertEquals( $number_list, $numbers_to_print );
    }

    /**
     * @dataProvider printNumbersProvider
     */
    public function testPrintNumbers( PrintNumbers $printNumbers, Numbers $numbers, array $number_list, string $print ) {
        $this->expectOutputString( $print );
        $printNumbers->printNumbers();
    }

    public function printNumbersProvider() {
        $test_cases = $this->test_cases;
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

        $printNumbersArray = [];

        foreach( $test_cases as $test_case ) {
            $numbers = new Numbers( $test_case['start'], $test_case['limit'], $test_case['cases'] );
            $numbers->setNumbers( ConvertNumbers::changeNumber( $numbers ) );

            $printNumbersArray[] = [
                new PrintNumbers( $numbers ),
                $numbers,
                $test_case['array_numbers'],
                $test_case['string_numbers']
            ];
        }

        return $printNumbersArray;
    }
}