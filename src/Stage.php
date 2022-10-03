<?php

namespace Descom\Pipeline;

use Descom\Pipeline\Test\PipelineTest;

abstract class Stage
{
    private PipeLineOptions $options;

    /**
     * Process the payload.
     *
     * @param mixed $payload
     *
     * @return mixed
     */
    abstract public function handle($payload);

    public function options(array $options): static
    {
        $this->options = new PipeLineOptions($options);

        return $this;
    }

    protected function option(string $key)
    {
        return $this->options->get($key);
    }
}
