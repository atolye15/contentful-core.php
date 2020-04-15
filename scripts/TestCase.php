<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests;

use Atolye15\Core\Api\Link;
use PHPUnit\Framework\TestCase as BaseTestCase;
use function GuzzleHttp\json_decode as guzzle_json_decode;
use function GuzzleHttp\json_encode as guzzle_json_encode;

class TestCase extends BaseTestCase
{
    /**
     * @var string[]
     */
    private static $classMap = [];

    /**
     * Creates an empty assertion (true == true).
     * This is done to mark tests that are expected to simply work (i.e. not throw exceptions).
     * As PHPUnit does not provide convenience methods for marking a test as passed,
     * we define one.
     */
    protected function markTestAsPassed()
    {
        $this->assertTrue(\true, 'Test case did not throw an exception and passed.');
    }

    /**
     * @param string $id
     * @param string $linkType
     * @param Link   $link
     * @param string $message
     */
    protected function assertLink(string $id, string $linkType, Link $link, string $message = '')
    {
        $this->assertSame($id, $link->getId(), $message);
        $this->assertSame($linkType, $link->getLinkType(), $message);
    }

    /**
     * @param string $file
     * @param object $object
     * @param string $message
     */
    protected function assertJsonFixtureEqualsJsonObject(string $file, $object, string $message = '')
    {
        $dir = $this->convertClassToFixturePath(\debug_backtrace()[1]['class']);

        $this->assertJsonStringEqualsJsonFile($dir.'/'.$file, guzzle_json_encode($object), $message);
    }

    /**
     * @param string $file
     * @param string $string
     * @param string $message
     */
    protected function assertJsonFixtureEqualsJsonString(string $file, string $string, string $message = '')
    {
        $dir = $this->convertClassToFixturePath(\debug_backtrace()[1]['class']);

        $this->assertJsonStringEqualsJsonFile($dir.'/'.$file, $string, $message);
    }

    /**
     * @param string $file
     *
     * @return string
     */
    protected function getFixtureContent(string $file): string
    {
        $dir = $this->convertClassToFixturePath(\debug_backtrace()[1]['class']);

        return \file_get_contents($dir.'/'.$file);
    }

    /**
     * @param string $file
     *
     * @return array|null
     */
    protected function getParsedFixture(string $file)
    {
        $dir = $this->convertClassToFixturePath(\debug_backtrace()[1]['class']);

        return guzzle_json_decode(\file_get_contents($dir.'/'.$file), \true);
    }

    /**
     * This automatically determines where to store the fixture according to the test name.
     * For instance, it will convert a the class
     * Contentful\Tests\Core\Unit\Api\BaseClient
     * to 'tests/Fixtures/Unit/Api/BaseClient/'.$file.
     *
     * @param string $class
     *
     * @return string
     */
    private function convertClassToFixturePath(string $class): string
    {
        if (isset(self::$classMap[$class])) {
            return self::$classMap[$class];
        }

        // Removes the initial common namespace prefix
        $extractedClass = \str_replace('Contentful\\Tests\\', '', $class);
        // Removes the initial library specific prefix (Core, Delivery, Management, etc)
        $extractedClass = \mb_substr($extractedClass, \mb_strpos($extractedClass, '\\') + 1);
        // Converts the namespace separator to the directory separator, as defined in PSR-4
        $extractedClass = \str_replace('\\', \DIRECTORY_SEPARATOR, $extractedClass);
        // Removes the "Test" suffix from the class name
        $extractedClass = \mb_substr($extractedClass, 0, -4);

        // Uses the path of the class to determine the starting point of the tests
        $reflection = new \ReflectionClass($class);
        $testsPath = \str_replace($extractedClass.'Test.php', '', $reflection->getFileName());

        return self::$classMap[$class] = $testsPath.'/Fixtures/'.$extractedClass;
    }
}
