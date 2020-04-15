<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Implementation;

use Atolye15\Core\ResourceBuilder\BaseResourceBuilder;
use Atolye15\Core\ResourceBuilder\MapperInterface;

class ResourceBuilder extends BaseResourceBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getMapperNamespace(): string
    {
        return __NAMESPACE__;
    }

    /**
     * {@inheritdoc}
     */
    protected function createMapper($fqcn): MapperInterface
    {
        if ('Mapper' !== \mb_substr($fqcn, -6)) {
            $fqcn .= 'Mapper';
        }

        return new $fqcn();
    }

    /**
     * {@inheritdoc}
     */
    protected function getSystemType(array $data): string
    {
        return $data['sys']['type'];
    }
}
