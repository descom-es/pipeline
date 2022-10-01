<?php

namespace Descom\Pipeline\Test;

use Descom\Pipeline\Tests\Support\ArgumentPipeline;
use Descom\Pipeline\Tests\Support\ArgumentStage;
use PHPUnit\Framework\TestCase;

class ArgumentTest extends TestCase
{
    public function testPipeline()
    {
        ArgumentPipeline::getInstance()->pipe(new ArgumentStage());

        $this->assertEquals(
            9.35,
            ArgumentPipeline::getInstance()
                ->option('discountPercent', 15)
                ->option('taxPercent', 10)
                ->process(10)
        );

        $this->assertEquals(
            9.2,
            ArgumentPipeline::getInstance()
                ->option('discountPercent', 20)
                ->option('taxPercent', 15)
                ->process(10)
        );
    }
}
