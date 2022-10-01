<?php

namespace Descom\Pipeline\Test;

use Descom\Pipeline\Tests\Support\ArgumentPipeline;
use Descom\Pipeline\Tests\Support\ArgumentPipelineSample;
use Descom\Pipeline\Tests\Support\ArgumentStage;
use Descom\Pipeline\Tests\Support\DoubleArgumentStage;
use PHPUnit\Framework\TestCase;

class ArgumentTest extends TestCase
{
    public function testPipelineWithArguments()
    {
        ArgumentPipeline::getInstance()->pipe(new ArgumentStage());

        $this->assertEquals(
            9.35,
            ArgumentPipeline::getInstance()
                ->process(10, [
                    'discountPercent' => 15,
                    'taxPercent' => 10,
                ])
        );

        $this->assertEquals(
            9.2,
            ArgumentPipeline::getInstance()
                ->process(10, [
                    'discountPercent' => 20,
                    'taxPercent' => 15,
                ])
        );
    }

    public function testPipelineWithArgumentsSample()
    {
        ArgumentPipelineSample::getInstance()->pipe(new DoubleArgumentStage());

        $this->assertEquals(
            80,
            ArgumentPipelineSample::getInstance()
                ->process(10, [
                    'twiceDouble' => 3
                ])
        );

        $this->assertEquals(
            20,
            ArgumentPipelineSample::getInstance()
                ->process(10)
        );
    }
}
