<?php
/**
 * Interface representing standard and extended HTTP status codes. These codes
 * are represented as an interface so that developers may implement it and then
 * use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * PHP version 5.3
 *
 * @category StatusCode
 *
 * @package Teapot\StatusCode
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @codingStandardsIgnoreStart
 *
 * @link http://shrikeh.github.com/teapot
 * @link http://lists.w3.org/Archives/Public/public-web-perf/2013Apr/att-0007/WebRequestStatusCodes4.html
 * @codingStandardsIgnoreEnd
 */
namespace Teapot\StatusCode;

use Teapot\StatusCode\RFC\RFC2324;
use Teapot\StatusCode\RFC\RFC2616;
use Teapot\StatusCode\RFC\RFC2774;
use Teapot\StatusCode\RFC\RFC7725;

/**
 * Interface representing standard and extended HTTP status codes. These codes
 * are represented as an interface so that developers may implement it and then
 * use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * @category StatusCode
 *
 * @package Teapot\StatusCode
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @codingStandardsIgnoreStart
 *
 * @link http://shrikeh.github.com/teapot
 * @link http://lists.w3.org/Archives/Public/public-web-perf/2013Apr/att-0007/WebRequestStatusCodes4.html
 * @codingStandardsIgnoreEnd
 */
interface Http extends RFC2616, RFC2324, RFC2774, RFC7725
{
}
