<?php

namespace Descom\Pipeline;

abstract class Stage
{
    private PipeLineOptions $options;

    public function options(PipeLineOptions $options): static
    {
        $this->options = $options;

        return $this;
    }

    protected function option(string $key)
    {
        return $this->options->get($key);
    }

    /**
     * Process the payload.
     *
     * @param mixed $payload
     *
     * @return mixed
     */
    abstract public function handle($payload);
}
