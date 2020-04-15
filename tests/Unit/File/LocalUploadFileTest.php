<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Unit\File;

use Atolye15\Core\Api\Link;
use Atolye15\Core\File\LocalUploadFile;
use Atolye15\Tests\TestCase;

class LocalUploadFileTest extends TestCase
{
    /**
     * @var LocalUploadFile
     */
    protected $file;

    protected function setUp(): void
    {
        $this->file = new LocalUploadFile(
            'the_great_gatsby.txt',
            'image/png',
            new Link('1reper3p12RdEVfC13QsUR', 'Upload')
        );
    }

    public function testGetter()
    {
        $this->assertSame('the_great_gatsby.txt', $this->file->getFileName());
        $this->assertSame('image/png', $this->file->getContentType());
        $this->assertSame('1reper3p12RdEVfC13QsUR', $this->file->getUploadFrom()->getId());
        $this->assertSame('Upload', $this->file->getUploadFrom()->getLinkType());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonFixtureEqualsJsonObject('serialized.json', $this->file);
    }
}
