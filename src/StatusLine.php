<?php
/**
 * Interface representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616.
 *
 * PHP version 5.3
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @link      https://shrikeh.github.com/teapot
 */
namespace Teapot;
/**
 * Interface representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616.
 *
 * PHP version 5.3
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @link      https://shrikeh.github.com/teapot
 */
interface StatusLine
{
    /**
     * Return the HTTP version of the response.
     *
     * @return string
     * @link   https://www.w3.org/Protocols/rfc2616/rfc2616-sec6.html#sec6.1
     */
    public function version();

    /**
     * Return the response Status Code.
     *
     * @return int
     * @link   https://www.w3.org/Protocols/rfc2616/rfc2616-sec6.html#sec6.1
     */
    public function code();

    /**
     * Return the Reason-Phrase.
     *
     * @return string
     * @link   https://www.w3.org/Protocols/rfc2616/rfc2616-sec6.html#sec6.1
     */
    public function reason();
}
