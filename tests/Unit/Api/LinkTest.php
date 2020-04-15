<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Unit\Api;

use Atolye15\Core\Api\Link;
use Atolye15\Tests\TestCase;

class LinkTest extends TestCase
{
    public function testGetter()
    {
        $link = new Link('123', 'Entry');

        $this->assertSame('123', $link->getId());
        $this->assertSame('Entry', $link->getLinkType());
    }

    public function testJsonSerialize()
    {
        $link = new Link('123', 'Entry');

        $this->assertJsonFixtureEqualsJsonObject('serialized.json', $link);
    }
}
