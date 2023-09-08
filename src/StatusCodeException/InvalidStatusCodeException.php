<?php
/**
 * Exception thrown when the Status Code is invalid.
 *
 * @category Exception
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @see      https://shrikeh.github.com/teapot
 */

namespace Teapot\StatusCodeException;

use InvalidArgumentException;

/**
 * Exception thrown when the Status Code is invalid.
 *
 * @category Exception
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @see      https://shrikeh.github.com/teapot
 */
class InvalidStatusCodeException extends InvalidArgumentException
{
    /**
     * Named constructor for non-numeric status codes.
     */
    public static function notNumeric(string $code): self
    {
        return new self(\sprintf(
            'Status code must be numeric, but received %d',
            $code,
        ));
    }

    /**
     * Named constructor for numeric status codes below 100.
     */
    public static function notGreaterOrEqualTo100(int $code): self
    {
        return new self(\sprintf(
            'Status code must be 100 or greater but code was %d',
            $code,
        ));
    }
}
