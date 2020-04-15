<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Core\Exception;

use Atolye15\Core\Api\Exception;

/**
 * An AccessTokenInvalidException gets thrown when the access token was not accepted by the API.
 */
class AccessTokenInvalidException extends Exception
{
}
