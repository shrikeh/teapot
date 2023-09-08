<?php
/**
 * Interface representing standard HTTP status codes. These codes are
 * represented as an interface so that developers may implement it and then use
 * parent::[CODE] to gain a code, or to extend the codes using static::[CODE]
 * and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * PHP version 5.3
 *
 * @category StatusCode
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @codingStandardsIgnoreStart
 *
 * @see http://lists.w3.org/Archives/Public/public-web-perf/2013Apr/att-0007/WebRequestStatusCodes4.html
 * @see https://shrikeh.github.com/teapot
 * @codingStandardsIgnoreEnd
 */

namespace Teapot;

use Teapot\StatusCode\Http;

/**
 * Interface representing standard HTTP status codes. These codes are
 * represented as an interface so that developers may implement it and then use
 * parent::[CODE] to gain a code, or to extend the codes using static::[CODE]
 * and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * @category StatusCode
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @codingStandardsIgnoreStart
 *
 * @see http://lists.w3.org/Archives/Public/public-web-perf/2013Apr/att-0007/WebRequestStatusCodes4.html
 * @see https://shrikeh.github.com/teapot
 * @codingStandardsIgnoreEnd
 */
interface StatusCode extends Http
{
    public const INFORMATIONAL = 1;
    public const SUCCESSFUL    = 2;
    public const REDIRECTION   = 3;
    public const CLIENT_ERROR  = 4;
    public const SERVER_ERROR  = 5;
}
