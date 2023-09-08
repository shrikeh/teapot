<?php
/**
 * Class representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616 and RFC 7231.
 *
 * @category StatusLine
 *
 * @package Teapot\StatusLine
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @see      https://shrikeh.github.com/teapot
 */

namespace Teapot\StatusLine;

use Psr\Http\Message\ResponseInterface;
use Teapot\StatusCode;
use Teapot\StatusCodeException\InvalidStatusCodeException;
use Teapot\StatusLine;

/**
 * Class representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616 and RFC 7231.
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @see      https://shrikeh.github.com/teapot
 * @api
 */
final class ResponseStatusLine implements StatusLine
{
    /**
     * The actual response code.
     */
    private int $code;

    /**
     * The reason phrase.
     */
    private string $reason;

    /**
     * ResponseStatusLine constructor.
     * @param int|string $code   The HTTP response code
     * @param string     $reason The reason phrase
     */
    public function __construct(int|string $code, string $reason)
    {
        if (\is_string($code)) {
            if ((string) (int) $code !== $code) {
                throw InvalidStatusCodeException::notNumeric($code);
            }

            $code = (int) $code;
        }

        if (100 > $code) {
            throw InvalidStatusCodeException::notGreaterOrEqualTo100($code);
        }

        $this->code   = $code;
        $this->reason = $reason;
    }

    /**
     * Return the response code.
     */
    public function statusCode(): int
    {
        return $this->code;
    }

    /**
     * Return the reason phrase
     */
    public function reasonPhrase(): string
    {
        return $this->reason;
    }

    /**
     * Add the status code and reason phrase to a Response.
     */
    public function response(ResponseInterface $response): ResponseInterface
    {
        return $response->withStatus(
            $this->statusCode(),
            $this->reasonPhrase(),
        );
    }

    /**
     * Return the status class of the response code.
     */
    public function statusClass(): int
    {
        return (int) \floor($this->code / 100);
    }

    /**
     * Helper to establish if the class of the status code
     * is informational (1xx).
     */
    public function isInformational(): bool
    {
        return $this->isStatusClass(StatusCode::INFORMATIONAL);
    }

    /**
     * Helper to establish if the class of the status code
     * is successful (2xx).
     */
    public function isSuccessful(): bool
    {
        return $this->isStatusClass(StatusCode::SUCCESSFUL);
    }

    /**
     * Helper to establish if the class of the status code
     * is redirection (3xx).
     */
    public function isRedirection(): bool
    {
        return $this->isStatusClass(StatusCode::REDIRECTION);
    }

    /**
     * Helper to establish if the class of the status code
     * is client error (4xx).
     */
    public function isClientError(): bool
    {
        return $this->isStatusClass(StatusCode::CLIENT_ERROR);
    }

    /**
     * Helper to establish if the class of the status code
     * is server error (5xx).
     */
    public function isServerError(): bool
    {
        return $this->isStatusClass(StatusCode::SERVER_ERROR);
    }

    /**
     * Test whether the response class matches the class passed to it.
     *
     * @param int $class The class of the response code
     */
    private function isStatusClass(int $class): bool
    {
        return $this->statusClass() === $class;
    }
}
