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
 * A list of status codes can be found here:
 * @see http://lists.w3.org/Archives/Public/public-web-perf/2013Apr/att-0007/WebRequestStatusCodes4.html
 *
 * PHP version 5.3
 *
 * @category   StatusCode
 * @package    Teapot
 * @subpackage HttpResponse
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
namespace Teapot;

use \Teapot\StatusCode\RFC\RFC2616;

/**
 * Interface representing standard HTTP status codes. These codes are
 * represented as an interface so that developers may implement it and then use
 * parent::[CODE] to gain a code, or to extend the codes using static::[CODE]
 * and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * @category   StatusCode
 * @package    Teapot
 * @subpackage HttpResponse
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
interface StatusCode extends RFC2616, RFC2324
{

    /**
     * Returned by the version 1 Search and Trends APIs when you are being rate
     * limited.
     *
     * @see https://dev.twitter.com/docs/rate-limiting/1
     * @var integer
     */
    const TWITTER_ENHANCE_YOUR_CALM = 420;


    /**
     * The Upgrade response header field advertises possible protocol upgrades
     * a server MAY accept. In conjunction with the "426 Upgrade Required"
     * status code, a server can advertise the exact protocol upgrades that a
     * client MUST accept to complete the request. The server MAY include an
     * Upgrade header in any response other than 101 or 426 to indicate a
     * willingness to switch to any (combination) of the protocols listed.
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     * @var integer
     */
    const UPDATE_REQUIRED = 426;


    /**
     * Transparent content negotiation for the request results in a circular
     * reference.
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     * @var integer
     */
    const VARIANT_ALSO_NEGOTIATES = 506;

    /**
     * The server is unable to store the representation needed to complete the
     * request.
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     * @var integer
     */
    const INSUFFICIENT_STORAGE = 507;

    /**
     * Further extensions to the request are required for the server to fulfill
     * it.
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     * @var integer
     */
    const NOT_EXTENDED = 510;
}
