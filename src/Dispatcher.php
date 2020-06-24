<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

/**
 * Class Dispatcher
 */
class Dispatcher implements EventDispatcherInterface
{
    /** @var ListenerProviderInterface */
    protected $listenerProvider;

    public function __construct(\Psr\EventDispatcher\ListenerProviderInterface $listenerProvider = null)
    {
        if ($listenerProvider) {
            $this->listenerProvider = $listenerProvider;
        }
    }

    public function dispatch(object $event)
    {
        /** @var EventInterface $event */
        /** @var ListenerInterface $listener */
        foreach ($this->getListenerProvider()->getListenersForEvent($event) as $listener) {
            $listener->execute($event);
        }
    }

    /**
     * @param ListenerInterface $listener
     * @return $this
     */
    public function attachListener(ListenerInterface $listener): EventDispatcherInterface
    {
        $this->getListenerProvider()->addListener($listener);
        return $this;
    }

    /**
     * @param ListenerInterface|string $listenerOrKey
     * @return bool
     */
    public function detachListener($listenerOrKey)
    {
        return $this->getListenerProvider()->removeListener($listenerOrKey);
    }

    public function getListenerProvider(): ListenerProviderInterface
    {
        if ($this->listenerProvider === null) {
            $this->listenerProvider = new ListenerProvider();
        }
        return $this->listenerProvider;
    }
}