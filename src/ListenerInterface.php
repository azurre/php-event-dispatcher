<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

interface ListenerInterface
{
    public function getKey(): string;
    public function getListenedEvents(): array;
    public function execute(EventInterface $event): void;
}
