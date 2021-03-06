<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Core\Resource;

class ArraySystemProperties implements SystemPropertiesInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $data)
    {
        // Little "hack" to trick PHPStan
        // Not the cleanest thing, but it works.
        $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        throw new \LogicException('Resource of type Array does not have an ID.');
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'Array';
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => 'Array',
        ];
    }
}
