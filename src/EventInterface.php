<?php
/**
 * @author Alex Milenin
 * @email  admin@azrr.info
 * @copyright Copyright (c)Alex Milenin (https://azrr.info/)
 */

namespace Azurre\EventDispatcher;

interface EventInterface extends \Psr\EventDispatcher\StoppableEventInterface
{
    public static function create(string $key, $data = null): self;

    public function getKey(): string;

    public function setData(string $key, $data): self;

    /**
     * @param string $key
     * @return mixed
     */
    public function getData(string $key = 'data');
}