<?php

namespace Descom\Pipeline;

class PipeLineOptions
{
    private array $options = [];

    public function __construct(array $options)
    {
        foreach ($options as $key => $value) {
            $this->options[$key] = $value;
        }
    }

    public function get(string $key)
    {
        return $this->options[$key] ?? null;
    }
}
