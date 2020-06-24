# PHP Event Dispatcher  [![Latest Version](https://img.shields.io/github/release/azurre/php-event-dispatcher.svg?style=flat-square)](https://github.com/azurre/php-event-dispatcher/releases)
This small and easy to use PHP shell make it able to run commands as non blocking asynchronous jobs 

## Installation
Install composer in your project:
```
curl -s https://getcomposer.org/installer | php
```

Require the package with composer:

```
composer require azurre/php-event-dispatcher
```

## Usage

### Simple example

```php
$loader = require_once __DIR__ . '/vendor/autoload.php';

use Azurre\EventDispatcher;
```

## License
[MIT](https://choosealicense.com/licenses/mit/)