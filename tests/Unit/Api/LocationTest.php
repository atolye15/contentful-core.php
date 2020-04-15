<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Unit\Api;

use Atolye15\Core\Api\Location;
use Atolye15\Tests\TestCase;

class LocationTest extends TestCase
{
    public function testGetters()
    {
        $lat = 15.0;
        $long = 17.8;

        $loc = new Location($lat, $long);
        $this->assertSame($lat, $loc->getLatitude());
        $this->assertSame($long, $loc->getLongitude());
    }

    public function testJsonSerialization()
    {
        $loc = new Location(15.0, 17.8);

        $this->assertJsonFixtureEqualsJsonObject('serialized.json', $loc);
    }

    public function testQueryStringFormatted()
    {
        $loc = new Location(15.0, 17.8);

        $this->assertSame('15,17.8', $loc->queryStringFormatted());
    }
}
