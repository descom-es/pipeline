<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class AddStage extends Stage
{
    public function handle($payload)
    {
        return $payload + 1;
    }
}
