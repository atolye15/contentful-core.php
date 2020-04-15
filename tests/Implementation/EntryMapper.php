<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Implementation;

use Atolye15\Core\ResourceBuilder\MapperInterface;

class EntryMapper implements MapperInterface
{
    /**
     * {@inheritdoc}
     */
    public function map($resource, array $data)
    {
        return new Resource($data['sys']['id'], $data['sys']['type'], $data['title']);
    }
}
