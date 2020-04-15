<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Core\ResourceBuilder;

use Atolye15\Core\Resource\ResourceArray;
use Atolye15\Core\Resource\ResourceInterface;

/**
 * ResourceBuilderInterface.
 *
 * This class is responsible for populating PHP objects
 * using data received from Contentful's API.
 */
interface ResourceBuilderInterface
{
    /**
     * Creates or updates an object using given data.
     * This method will overwrite properties of the $resource parameter.
     *
     * @param array                  $data     The raw API data
     * @param ResourceInterface|null $resource A object if it needs to be updated, or null otherwise
     *
     * @return ResourceInterface|ResourceArray
     */
    public function build(array $data, ResourceInterface $resource = \null);
}
