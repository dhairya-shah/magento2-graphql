<?php

declare(strict_types=1);

namespace Dhairya\TestGraph\Api\Data;

/**
 * Represents a store and properties
 *
 * @api
 */
interface TestGraphInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const NAME = 'name';
    const DESC = 'description';

    /**#@-*/

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getDescription(): ?string;

    public function setDescription(?string $desc): void;
}