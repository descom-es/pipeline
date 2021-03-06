<?php

namespace Descom\Pipeline;

/** @phpstan-consistent-constructor */
abstract class PipeLine
{
    private static array $self = [];

    private array $stages = [];

    private function __construct()
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
            $payload = $this->proccesStage($stage, $payload);
        }

        return $payload;
    }

    private function proccesStage($stage, $payload)
    {
        return $stage->__invoke($payload);
    }
}
