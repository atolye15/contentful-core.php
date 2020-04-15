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
use Atolye15\Core\Resource\ResourceInterface;
use Atolye15\Core\Resource\SystemPropertiesInterface;

class SecretResource implements ResourceInterface
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
     * @var string
     */
    private $secretId;

    /**
     * SecretResource constructor.
     */
    public function __construct(string $id, string $type, string $secretId)
    {
        $this->id = $id;
        $this->type = $type;
        $this->secretId = $secretId;
    }

    /**
     * {@inheritdoc}
     */
    public function getSystemProperties(): SystemPropertiesInterface
    {
        return \null;
    }

    /**
     * {@inheritdoc}
     */
    public function asLink(): Link
    {
        return new Link($this->id, $this->type);
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
    public function getSecretId(): string
    {
        return $this->secretId;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize(): array
    {
        return [];
    }
}
