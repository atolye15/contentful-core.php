<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Unit\Resource;

use Atolye15\Tests\Core\Implementation\ResourcePool;
use Atolye15\Tests\TestCase;

class BaseResourcePoolTest extends TestCase
{
    public function testSanitize()
    {
        $pool = new ResourcePool();

        $this->assertSame(
            'some___42___string___45___which___95___will___46___sanitize',
            $pool->sanitize('some*string-which_will.sanitize')
        );
    }
}
