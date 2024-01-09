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

    public function process($payload, array $options = [])
    {
        foreach ($this->stages as $stage) {
            $payload = $this->processStage($stage, $payload, $options);
        }

        return $payload;
    }

    public function hasStages(): bool
    {
        return count($this->stages) > 0;
    }

    private function processStage(Stage $stage, $payload, $options)
    {
        $stage->options($options);

        return $stage->handle($payload);
    }
}
