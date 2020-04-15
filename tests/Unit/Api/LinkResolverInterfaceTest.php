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
use Atolye15\Tests\Core\Implementation\Entry;
use Atolye15\Tests\Core\Implementation\LinkResolver;
use Atolye15\Tests\TestCase;

class LinkResolverInterfaceTest extends TestCase
{
    public function testLinkResolver()
    {
        $linkResolver = new LinkResolver();

        /** @var Entry $entry */
        $entry = $linkResolver->resolveLink(
            new Link('someEntryId', 'Entry'),
            ['someParameter' => 'someValue']
        );

        $this->assertSame('someEntryId', $entry->getId());
        $this->assertSame('Entry', $entry->getType());
        $this->assertSame(['someParameter' => 'someValue'], $entry->getParameters());

        /** @var Entry[] $entries */
        $entries = $linkResolver->resolveLinkCollection(
            [new Link('someEntryId', 'Entry')],
            ['someParameter' => 'someValue']
        );

        $this->assertContainsOnlyInstancesOf(Entry::class, $entries);
        $this->assertCount(1, $entries);

        $entry = $entries[0];

        $this->assertSame('someEntryId', $entry->getId());
        $this->assertSame('Entry', $entry->getType());
        $this->assertSame(['someParameter' => 'someValue'], $entry->getParameters());
    }
}
