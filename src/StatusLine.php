<?php
/**
 * Class representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616 and RFC 7231.
 *
 * PHP version 5.3
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @link      https://shrikeh.github.com/teapot
 */
namespace Teapot;

use Teapot\StatusCodeException\InvalidStatusCodeException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616 and RFC 7231.
 *
 * PHP version 5.3
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @link      https://shrikeh.github.com/teapot
 */
class StatusLine
{
    /**
     * The actual response code.
     *
     * @var int
     */
    private $code;

    /**
     * The reason phrase.
     *
     * @var string
     */
    private $reason;

    /**
     * Constructor.
     *
     * @param int    $code   The response code
     * @param string $reason The reason phrase
     */
    final public function __construct($code, $reason)
    {
        $this->setCode($code);
        $this->reason = $reason;
    }

    /**
     * Return the response code.
     *
     * @return int
     */
    final public function code()
    {
        return $this->code;
    }

    /**
     * Return the reason phrase
     *
     * @return string
     */
    final public function reason()
    {
        return (string) $this->reason;
    }

    /**
     * Add the status code and reason phrase to a Response.
     *
     * @param ResponseInterface $response The response
     * @return ResponseInterface
     */
    public function response(ResponseInterface $response)
    {
        return $response->withStatus($this->code(), $this->reason());
    }

    /**
     * Return the status class of the response code.
     *
     * @return int
     */
    final public function responseClass()
    {
        return (int) floor($this->code / 100);
    }

    /**
     * Helper to establish if the class of the status code
     * is informational (1xx).
     *
     * @return bool
     */
    final public function isInformational()
    {
        return $this->is(StatusCode::INFORMATIONAL);
    }

    /**
     * Helper to establish if the class of the status code
     * is successful (2xx).
     *
     * @return bool
     */
    final public function isSuccessful()
    {
        return $this->is(StatusCode::SUCCESSFUL);
    }

    /**
     * Helper to establish if the class of the status code
     * is redirection (3xx).
     *
     * @return bool
     */
    final public function isRedirection()
    {
        return $this->is(StatusCode::REDIRECTION);
    }

    /**
     * Helper to establish if the class of the status code
     * is client error (4xx).
     *
     * @return bool
     */
    final public function isClientError()
    {
        return $this->is(StatusCode::CLIENT_ERROR);
    }

    /**
     * Helper to establish if the class of the status code
     * is server error (5xx).
     *
     * @return bool
     */
    final public function isServerError()
    {
        return $this->is(StatusCode::SERVER_ERROR);
    }

    /**
     * Set the code. Used in constructor to ensure the code meets the
     * requirements for a status code.
     *
     * @param int $code The status code
     * @throws InvalidStatusCodeException If the status code is invalid
     */
    private function setCode($code)
    {
        if (!is_numeric($code)) {
            throw new InvalidStatusCodeException(sprintf(
                'Status code must be numeric, but received %d',
                $code
            ));
        }
        $code = (int) $code;

        if ($code < 100) {
            throw new InvalidStatusCodeException(sprintf(
                'Status code must be 100 or greater but code was %d',
                $code
            ));
        }
        $this->code = $code;
    }

    /**
     * Test whether the response class matches the class passed to it.
     *
     * @param int $class The class of the response code
     * @return bool
     */
    private function is($class)
    {
        return ($this->responseClass() === $class);
    }
}
