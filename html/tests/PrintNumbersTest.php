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
        return [
            [
                new PrintNumbers( 1, 20, [
                    '2' => 'Two',
                    '5' => 'Five',
                ] ),
                [
                    '1',
                    'Two',
                    '3',
                    'Two',
                    'Five',
                    'Two',
                    '7',
                    'Two',
                    '9',
                    'TwoANDFive',
                    '11',
                    'Two',
                    '13',
                    'Two',
                    'Five',
                    'Two',
                    '17',
                    'Two',
                    '19',
                    'TwoANDFive',
                ],
                '1, Two, 3, Two, Five, Two, 7, Two, 9, TwoANDFive, 11, Two, 13, Two, Five, Two, 17, Two, 19, TwoANDFive, '
            ],
            [
                new PrintNumbers( 10, 50, [
                    '3' => 'Three',
                    '5' => 'Five',
                    '4' => 'Four',
                ] ),
                [
                    'Five',
                    '11',
                    'ThreeANDFour',
                    '13',
                    '14',
                    'ThreeANDFive',
                    'Four',
                    '17',
                    'Three',
                    '19',
                    'FourANDFive',
                    'Three',
                    '22',
                    '23',
                    'ThreeANDFour',
                    'Five',
                    '26',
                    'Three',
                    'Four',
                    '29',
                    'ThreeANDFive',
                    '31',
                    'Four',
                    'Three',
                    '34',
                    'Five',
                    'ThreeANDFour',
                    '37',
                    '38',
                    'Three',
                    'FourANDFive',
                    '41',
                    'Three',
                    '43',
                    'Four',
                    'ThreeANDFive',
                    '46',
                    '47',
                    'ThreeANDFour',
                    '49',
                    'Five'
                ],
                'Five, 11, ThreeANDFour, 13, 14, ThreeANDFive, Four, 17, Three, 19, FourANDFive, Three, 22, 23, ThreeANDFour, Five, 26, Three, Four, 29, ThreeANDFive, 31, Four, Three, 34, Five, ThreeANDFour, 37, 38, Three, FourANDFive, 41, Three, 43, Four, ThreeANDFive, 46, 47, ThreeANDFour, 49, Five, '
            ],
            [
                new PrintNumbers( 1, 100, [
                    '3' => 'Three',
                    '5' => 'Five',
                ] ),
                [
                    "1",
                    "2",
                    "Three",
                    "4",
                    "Five",
                    "Three",
                    "7",
                    "8",
                    "Three",
                    "Five",
                    "11",
                    "Three",
                    "13",
                    "14",
                    "ThreeANDFive",
                    "16",
                    "17",
                    "Three",
                    "19",
                    "Five",
                    "Three",
                    "22",
                    "23",
                    "Three",
                    "Five",
                    "26",
                    "Three",
                    "28",
                    "29",
                    "ThreeANDFive",
                    "31",
                    "32",
                    "Three",
                    "34",
                    "Five",
                    "Three",
                    "37",
                    "38",
                    "Three",
                    "Five",
                    "41",
                    "Three",
                    "43",
                    "44",
                    "ThreeANDFive",
                    "46",
                    "47",
                    "Three",
                    "49",
                    "Five",
                    "Three",
                    "52",
                    "53",
                    "Three",
                    "Five",
                    "56",
                    "Three",
                    "58",
                    "59",
                    "ThreeANDFive",
                    "61",
                    "62",
                    "Three",
                    "64",
                    "Five",
                    "Three",
                    "67",
                    "68",
                    "Three",
                    "Five",
                    "71",
                    "Three",
                    "73",
                    "74",
                    "ThreeANDFive",
                    "76",
                    "77",
                    "Three",
                    "79",
                    "Five",
                    "Three",
                    "82",
                    "83",
                    "Three",
                    "Five",
                    "86",
                    "Three",
                    "88",
                    "89",
                    "ThreeANDFive",
                    "91",
                    "92",
                    "Three",
                    "94",
                    "Five",
                    "Three",
                    "97",
                    "98",
                    "Three",
                    "Five"
                ],
                '1, 2, Three, 4, Five, Three, 7, 8, Three, Five, 11, Three, 13, 14, ThreeANDFive, 16, 17, Three, 19, Five, Three, 22, 23, Three, Five, 26, Three, 28, 29, ThreeANDFive, 31, 32, Three, 34, Five, Three, 37, 38, Three, Five, 41, Three, 43, 44, ThreeANDFive, 46, 47, Three, 49, Five, Three, 52, 53, Three, Five, 56, Three, 58, 59, ThreeANDFive, 61, 62, Three, 64, Five, Three, 67, 68, Three, Five, 71, Three, 73, 74, ThreeANDFive, 76, 77, Three, 79, Five, Three, 82, 83, Three, Five, 86, Three, 88, 89, ThreeANDFive, 91, 92, Three, 94, Five, Three, 97, 98, Three, Five, '
            ]
        ];
    }
}