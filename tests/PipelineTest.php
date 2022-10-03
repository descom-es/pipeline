<?php

namespace Descom\Pipeline\Test;

use Descom\Pipeline\Tests\Support\DoubleStage;
use Descom\Pipeline\Tests\Support\IncreaseStage;
use Descom\Pipeline\Tests\Support\OnePipeline;
use Descom\Pipeline\Tests\Support\ThreePipeline;
use Descom\Pipeline\Tests\Support\TwoPipeline;
use PHPUnit\Framework\TestCase;

class PipelineTest extends TestCase
{
    public function testPipeline()
    {
        $this->injections();

        $this->assertEquals(21, OnePipeline::getInstance()->process(10));
        $this->assertEquals(22, TwoPipeline::getInstance()->process(10));
        $this->assertEquals(10, ThreePipeline::getInstance()->process(10));
    }

    private function injections()
    {
        OnePipeline::getInstance()->pipe(new DoubleStage())->pipe(new IncreaseStage());

        TwoPipeline::getInstance()->pipe(new IncreaseStage())->pipe(new DoubleStage());
    }
}
