# Pipeline to plugins

[![tests](https://github.com/descom-es/pipeline/actions/workflows/test.yml/badge.svg)](https://github.com/descom-es/pipeline/actions/workflows/test.yml)
[![analyse](https://github.com/descom-es/pipeline/actions/workflows/analyse.yml/badge.svg)](https://github.com/descom-es/pipeline/actions/workflows/analyse.yml)
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
- [AddStage](tests/Support/AddStage.php)

### Create Pipeline

```php
use Descom\Pipeline\PipeLine;

class SamplePipeline extends PipeLine
{}
```

### Configure plugin to add Stages

```php
    SamplePipeline::getInstance()->pipe(new DoubleStage())->pipe(new AddStage());
```

### Process pipeline to transform data in core

```php
    $payload = SamplePipeline::getInstance()->process($payload);
```

## Testing

``` bash
composer test
```
