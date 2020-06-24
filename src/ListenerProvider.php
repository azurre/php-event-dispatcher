<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

/**
 * Class ListenerProvider
 */
class ListenerProvider implements ListenerProviderInterface
{
    protected $listeners = [];
    protected $eventsListeners = [];

    public function getListenersForEvent(object $event): iterable
    {
        return $this->eventsListeners[$event->getKey()] ?? [];
    }

    public function addListener(ListenerInterface $listener): ListenerProviderInterface
    {
        if (isset($this->listeners[$listener->getKey()])) {
            throw new \Exception('Listener already attached');
        }
        $this->listeners[$listener->getKey()] = $listener;
        foreach ($listener->getListenedEvents() as $eventKey) {
            $this->eventsListeners[$eventKey] = $this->eventsListeners[$eventKey] ?? [];
            $this->eventsListeners[$eventKey][] = $listener;
        }
        return $this;
    }

    public function removeListener($listenerOrKey): bool
    {
        if (is_string($listenerOrKey)) {
            if (!isset($this->listeners[$listenerOrKey])) {
                return false;
            }
            $listener = $this->listeners[$listenerOrKey];
        } elseif (!$listenerOrKey instanceof ListenerInterface) {
            throw new \Exception('Listener must be an instance of ListenerInterface');
        }
        $listener = $listener ?? $listenerOrKey;
        if (!isset($this->listeners[$listener->getKey()])) {
            return false;
        }
        unset($this->listeners[$listener->getKey()]);
        foreach ($listener->getListenedEvents() as $idx => $eventKey) {
            /** @var ListenerInterface $eventListener */
            foreach ($this->eventsListeners[$eventKey] as $lidx => $eventListener) {
                if ($listener->getKey() === $eventListener->getKey()) {
                    unset($this->eventsListeners[$idx][$lidx]);
                }
            }
        }
        return true;
    }
}