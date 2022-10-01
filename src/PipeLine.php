<?php

namespace Descom\Pipeline;

abstract class PipeLine
{
    private static array $self = [];

    private array $stages = [];

    final private function __construct()
    {
    }

    public static function getInstance(): static
    {
        if (! isset(self::$self[static::class])) {
            self::$self[static::class] = new static();
        }

        return self::$self[static::class];
    }

    public function pipe(Stage $stage): static
    {
        $this->stages[] = $stage;

        return $this;
    }

    public function process($payload)
    {
        return $this->processStages($payload);
    }

    private function processStages($payload)
    {
        foreach ($this->stages as $stage) {
            $payload = $this->processStage($stage, $payload);
        }

        return $payload;
    }

    private function processStage($stage, $payload)
    {
        return $stage->handle($payload);
    }
}
