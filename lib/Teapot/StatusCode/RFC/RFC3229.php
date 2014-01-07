<?php
/**
 * Interface representing extended HTTP status codes for RFC3229. These codes are
 * represented as an interface so that developers may implement it and then use
 * parent::[CODE] to gain a code, or to extend the codes using static::[CODE]
 * and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
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
namespace Teapot\StatusCode\RFC;

/**
 * Interface representing extended HTTP status codes for RFC3229. These codes are
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

interface RFC3229
{
    /**
     * The server has fulfilled a GET request for the resource, and the
     * response is a representation of the result of one or more
     * instance-manipulations applied to the current instance. The actual
     * current instance might not be available except by combining this response
     * with other previous or future responses, as appropriate for the
     * specific instance-manipulation(s).  If so, the headers of the
     * resulting instance are the result of combining the headers from the
     * status-226 response and the other instances, following the rules in
     * section 13.5.3 of the HTTP/1.1 specification [10].
     *
     * The request MUST have included an A-IM header field listing at least
     * one instance-manipulation.  The response MUST include an Etag header
     * field giving the entity tag of the current instance. A response received
     * with a status code of 226 MAY be stored by a cache and used in reply to
     * a subsequent request, subject to the HTTP expiration mechanism and any
     * Cache-Control headers, and to the requirements in section 10.6.
     *
     * A response received with a status code of 226 MAY be used by a cache,
     * in conjunction with a cache entry for the base instance, to create a
     * cache entry for the current instance.
     *
     * @see http://www.ietf.org/rfc/rfc3229.txt
     * @var integer
     */
    const IM_USED = 226;
}
