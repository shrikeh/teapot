<?php
/**
 * Interface representing a Value Object of the HTTP Status-Line, as
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
 */

namespace Teapot;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface representing a Value Object of the HTTP Status-Line, as
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
interface StatusLine
{
    /**
     * Return the response code.
     */
    public function statusCode(): int;

    /**
     * Return the reason phrase
     */
    public function reasonPhrase(): string;

    /**
     * Add the status code and reason phrase to a Response.
     */
    public function response(ResponseInterface $response): ResponseInterface;

    /**
     * Return the status class of the response code.
     */
    public function statusClass(): int;

    /**
     * Helper to establish if the class of the status code
     * is informational (1xx).
     */
    public function isInformational(): bool;

    /**
     * Helper to establish if the class of the status code
     * is successful (2xx).
     */
    public function isSuccessful(): bool;

    /**
     * Helper to establish if the class of the status code
     * is redirection (3xx).
     */
    public function isRedirection(): bool;

    /**
     * Helper to establish if the class of the status code
     * is client error (4xx).
     */
    public function isClientError(): bool;

    /**
     * Helper to establish if the class of the status code
     * is server error (5xx).
     */
    public function isServerError(): bool;
}
