<?php

namespace Descom\Pipeline\Tests\Support;

use Descom\Pipeline\Stage;

class ArgumentStage extends Stage
{
    public function handle($payload)
    {
        $priceWithDiscount = $this->applyDiscount($payload);

        return round($this->applyTax($priceWithDiscount), 2);
    }

    private function applyDiscount($price)
    {
        return $price * (1 - $this->option('discountPercent') / 100);
    }

    private function applyTax($price)
    {
        return $price * (1 + $this->option('taxPercent') / 100);
    }
}
