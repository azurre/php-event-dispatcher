<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

interface EventDispatcherInterface extends \Psr\EventDispatcher\EventDispatcherInterface
{
    public function attachListener(ListenerInterface $listener): self;

    /**
     * @param ListenerInterface|string $listenerOrKey
     * @return bool
     */
    public function detachListener($listenerOrKey);
}
