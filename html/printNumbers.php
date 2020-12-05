<?php declare(strict_types=1);
final class PrintNumbers
{
    private $start;
    private $limit;

    private function __construct( int $start, int $limit )
    {
        $this->start = $start;
        $this->limit = $limit;
    }

    public static function defineRange( int $start, int $limit ) {
        return new self( $start, $limit );
    }
}