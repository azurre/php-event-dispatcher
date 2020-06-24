<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

interface ListenerProviderInterface extends \Psr\EventDispatcher\ListenerProviderInterface
{
    public function getListenersForEvent(object $event): iterable;

    public function addListener(ListenerInterface $listener): self;

    /**
     * @param ListenerInterface|string $listenerOrKey
     * @return bool
     */
    public function removeListener($listenerOrKey): bool;
}
