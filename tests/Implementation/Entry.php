<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Implementation;

use Atolye15\Core\Api\Link;
use Atolye15\Core\Resource\EntryInterface;

class Entry implements EntryInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $parameters;

    public function __construct(string $id, string $type, array $parameters = [])
    {
        $this->id = $id;
        $this->type = $type;
        $this->parameters = $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getSystemProperties()
    {
        throw new \Exception('Not supported');
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'parameters' => $this->parameters,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function asLink(): Link
    {
        return new Link($this->id, $this->type);
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
