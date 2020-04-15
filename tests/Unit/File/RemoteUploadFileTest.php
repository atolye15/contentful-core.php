<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Unit\File;

use Atolye15\Core\File\RemoteUploadFile;
use Atolye15\Tests\TestCase;

class RemoteUploadFileTest extends TestCase
{
    /**
     * @var RemoteUploadFile
     */
    protected $file;

    protected function setUp(): void
    {
        $this->file = new RemoteUploadFile(
            'the_great_gatsby.txt',
            'image/png',
            'https://www.example.com/the_great_gatsby.txt'
        );
    }

    public function testGetter()
    {
        $this->assertSame('the_great_gatsby.txt', $this->file->getFileName());
        $this->assertSame('image/png', $this->file->getContentType());
        $this->assertSame('https://www.example.com/the_great_gatsby.txt', $this->file->getUpload());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonFixtureEqualsJsonObject('serialized.json', $this->file);
    }
}
