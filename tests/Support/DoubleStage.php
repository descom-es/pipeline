<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class DoubleStage extends Stage
{
    public function __invoke($payload)
    {
        return $payload * 2;
    }
}
