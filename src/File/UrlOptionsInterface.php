<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Core\File;

/**
 * UrlOptionsInterface.
 */
interface UrlOptionsInterface
{
    /**
     * The urlencoded query string for these options.
     *
     * @return string
     */
    public function getQueryString(): string;
}
