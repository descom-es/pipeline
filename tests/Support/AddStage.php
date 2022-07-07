<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class AddStage implements Stage
{
    public function __invoke($payload)
    {
        return $payload + 1;
    }
}
