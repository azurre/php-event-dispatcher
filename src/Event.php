<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

/**
 * Class Event
 */
class Event implements EventInterface
{
    /** @var string */
    protected $key;

    /** @var array */
    protected $storage = [];

    /** @var bool */
    protected $propagationStopped = false;

    public function __construct(string $eventKey, $data = null)
    {
        $this->key = $eventKey;
        if ($data) {
            $this->setData('data', $data);
        }
    }

    public static function create(string $key, $data = null): EventInterface
    {
        return new static($key, $data);
    }

    /**
     * Return event key
     */
    public function getKey(): string
    {
        return $this->key;
    }

    public function setData(string $key, $data): \Azurre\EventDispatcher\EventInterface
    {
        $this->storage[$key] = $data;
        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getData(string $key = 'data')
    {
        return $this->storage[$key] ?? null;
    }

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    /**
     * Stops the propagation of the event to further event listeners.
     */
    public function stopPropagation(): self
    {
        $this->propagationStopped = true;
        return $this;
    }
}
