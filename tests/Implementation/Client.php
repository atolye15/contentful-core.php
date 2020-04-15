<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Implementation;

use Atolye15\Core\Api\BaseClient;
use Atolye15\Core\Resource\ResourceInterface;

class Client extends BaseClient
{
    public function request(string $method, string $uri, array $options = []): ResourceInterface
    {
    }

    /**
     * {@inheritdoc}
     */
    public function callApi(string $method, string $path, array $options = []): array
    {
        return parent::callApi($method, $path, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function getApi(): string
    {
        return 'DELIVERY';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getPackageName(): string
    {
        return 'contentful/core';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getSdkName(): string
    {
        return 'contentful-core.php';
    }

    /**
     * {@inheritdoc}
     */
    protected static function getApiContentType(): string
    {
        return 'application/vnd.contentful.delivery.v1+json';
    }
}
