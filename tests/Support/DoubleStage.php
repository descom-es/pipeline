<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class DoubleStage extends Stage
{
    public function handle($payload)
    {
        return $payload * 2;
    }
}
