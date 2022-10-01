<?php

namespace Descom\Pipeline;

class PipeLineOptions
{
    private array $options = [];

    public function __set(string $key, $value)
    {
        $this->options[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->options[$key] ?? null;
    }
}
