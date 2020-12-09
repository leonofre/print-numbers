<?php

class Numbers {
    private $start;
    private $limit;
    private $numbers;
    private $toExtensiveCases;

    public function __construct( int $start, int $limit, array $toExtensiveCases )
    {
        ksort( $toExtensiveCases );

        $this->start = $start;
        $this->limit = $limit;
        $this->toExtensiveCases = $toExtensiveCases;
    }

    public function setNumbers( array $numbers ) {
        $this->numbers = $numbers;
    }

    public function getStart() {
        return $this->start;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getToExtensiveCases() {
        return $this->toExtensiveCases;
    }

    public function getNumbers() {
        return $this->numbers;
    }
}
