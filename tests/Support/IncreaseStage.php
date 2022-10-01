<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class IncreaseStage extends Stage
{
    public function handle($payload)
    {
        return $payload + 1;
    }
}
