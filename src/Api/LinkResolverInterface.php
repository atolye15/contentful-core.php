<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Core\Api;

use Atolye15\Core\Resource\ResourceInterface;

interface LinkResolverInterface
{
    /**
     * @param Link     $link
     * @param string[] $parameters
     *
     * @return ResourceInterface
     */
    public function resolveLink(Link $link, array $parameters = []): ResourceInterface;

    /**
     * Resolves an array of links.
     * A method implementing this may apply some optimizations
     * to reduce the amount of necessary API calls, or simply forward this
     * to the "resolveLink" method.
     *
     * @param Link[]      $links
     * @param string|null $locale
     *
     * @return ResourceInterface[]
     */
    public function resolveLinkCollection(array $links, string $locale = \null): array;
}
