<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class DoubleArgumentStage extends Stage
{
    public function handle($payload): int
    {
        $twiceDouble = $this->option('twiceDouble') ?? 1;

        return $payload * pow(2, $twiceDouble);
    }
}
