# PHP Event Dispatcher  [![Latest Version](https://img.shields.io/github/release/azurre/php-event-dispatcher.svg?style=flat-square)](https://github.com/azurre/php-event-dispatcher/releases)
Simple implementation of Event Dispatcher

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

### The Dispatcher
```php
$loader = require_once __DIR__ . '/vendor/autoload.php';

use Azurre\EventDispatcher\Dispatcher;
use Azurre\EventDispatcher\Event;

$dispatcher = new Dispatcher();
$dispatcher->attachListener(new Logger());
// ...
// Do something
// ...
$event = new Event('my.event', new MyObject());
$dispatcher->dispatch($event);
$someData = $event->getData('some_data');
```

### Listener
```php
class Logger implements \Azurre\EventDispatcher\ListenerInterface
{
    public function getKey(): string
    {
        return 'my.event.logger';
    }

    public function getListenedEvents(): array
    {
        return ['my.event', 'my.another.event'];
    }

    public function execute(\Azurre\EventDispatcher\EventInterface $event): void
    {
        switch ($event->getKey()) {
            case 'my.event':
                // Modify data
                $data = $event->getData();
                $data->setIsLogged(true);
                $event->setData('some_data', [1,2,3]);
            break;
            case 'my.another.event':
                // Do another things
            break;
        }
    }
}
```

## License
[MIT](https://choosealicense.com/licenses/mit/)