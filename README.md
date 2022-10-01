# Pipeline to plugins

[![tests](https://github.com/descom-es/pipeline/actions/workflows/test.yml/badge.svg)](https://github.com/descom-es/pipeline/actions/workflows/test.yml)
[![analyze](https://github.com/descom-es/pipeline/actions/workflows/analyse.yml/badge.svg)](https://github.com/descom-es/pipeline/actions/workflows/analyse.yml)
[![styles](https://github.com/descom-es/pipeline/actions/workflows/fix_style.yml/badge.svg)](https://github.com/descom-es/pipeline/actions/workflows/fix_style.yml)

## Install

Via Composer

```bash
composer require descom/pipeline
```

## Usage

### Create Stages

Samples:

- [DoubleStage](tests/Support/DoubleStage.php)
- [IncreaseStage](tests/Support/IncreaseStage.php)

### Create Pipeline

```php
use Descom\Pipeline\PipeLine;

class SamplePipeline extends PipeLine
{}
```

### Configure plugin to add Stages

```php
    SamplePipeline::getInstance()
        ->pipe(new DoubleStage())
        ->pipe(new IncreaseStage());
```

### Process pipeline to transform data in core

```php
    $payload = 10;

    $payload = SamplePipeline::getInstance()
        ->process($payload); // return 21 (10 * 2) + 1
```

### Options

Perhaps you need to add options to the stages, for example, the number of times to double the value.
You can call method `with` to add options to the stages.

```php
    $payload = 10;

    $payload = SamplePipeline::getInstance()
        ->process($payload, [
            'twiceDouble' => 3,
            'twiceIncrease' => 2
        ]); // return 82 (10 * 2 ^ 3) + (1 + 1)
```

You can define `DoubleStage` as:

```php
class DoubleStage extends Stage
{
    public function handle($payload): int
    {
        $twiceDouble = $this->option('twiceDouble') ?? 1;

        return $payload * pow(2, $twiceDouble);
    }
}
```

## Testing

``` bash
composer test
```
