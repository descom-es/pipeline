<?php

namespace Descom\Pipeline;

abstract class Stage
{
    /**
     * Process the payload.
     *
     * @param mixed $payload
     *
     * @return mixed
     */
    abstract public function handle($payload);
}
