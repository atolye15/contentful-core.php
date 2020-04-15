<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Tests\Core\Implementation\Exception;

use Atolye15\Core\Api\Exception;

class BadRequestException extends Exception
{
    public function getBadRequestMessage(): string
    {
        return 'What kind of request did you send?';
    }
}
