<?php

/**
 * This file is part of the contentful/contentful-core package.
 *
 * @copyright 2015-2020 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Atolye15\Core\Api;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use function GuzzleHttp\json_decode as guzzle_json_decode;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;

class Requester
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var string
     */
    private $api;

    /**
     * @var string|null
     */
    private $exceptionNamespace;

    /**
     * ApiRequester constructor.
     */
    public function __construct(HttpClient $client, string $api, string $exceptionNamespace = null)
    {
        $this->httpClient = $client;
        $this->api = $api;
        $this->exceptionNamespace = $exceptionNamespace;
    }

    /**
     * Queries the API, and returns a message object
     * which contains all information needed for processing and logging.
     */
    public function sendRequest(RequestInterface $request): Message
    {
        $startTime = \microtime(true);

        $exception = null;
        try {
            $response = $this->httpClient->send($request);
        } catch (ClientException $exception) {
            $response = $exception->hasResponse()
                ? $exception->getResponse()
                : null;

            $exception = $this->createCustomException($exception);
        }

        $duration = \microtime(true) - $startTime;

        return new Message(
            $this->api,
            $duration,
            $request,
            $response,
            $exception
        );
    }

    /**
     * Attempts to create a custom exception.
     * It will return a default exception if no suitable class is found.
     */
    private function createCustomException(ClientException $exception): Exception
    {
        $errorId = '';
        $response = $exception->getResponse();
        if ($response) {
            try {
                $data = guzzle_json_decode((string) $response->getBody(), true);
                $errorId = (string) $data['sys']['id'] ?? '';
            } catch (InvalidArgumentException $invalidArgumentException) {
                $errorId = 'InvalidResponseBody';
            }
        }

        $exceptionClass = $this->getExceptionClass($errorId);

        return new $exceptionClass($exception);
    }

    /**
     * Returns the FQCN of an exception class to be used for the given API error.
     */
    private function getExceptionClass(string $apiError): string
    {
        if ($this->exceptionNamespace) {
            $class = $this->exceptionNamespace.'\\'.$apiError.'Exception';

            if (\class_exists($class)) {
                return $class;
            }
        }

        $class = '\\Contentful\\Core\\Exception\\'.$apiError.'Exception';

        return \class_exists($class) ? $class : Exception::class;
    }
}
