<?php
/**
 * Interface representing extended HTTP status codes for RFC7238. These codes
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
 * @package Teapot\StatusCode\RFC
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */
namespace Teapot\StatusCode\RFC;

/**
 * Interface representing extended HTTP status codes for RFC7238. These codes
 * are represented as an interface so that developers may implement it and then
 * use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * @category StatusCode
 *
 * @package Teapot\StatusCode\RFC
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */
interface RFC7238
{
    /**
     * The 308 (Permanent Redirect) status code indicates that the target
     * resource has been assigned a new permanent URI and any future references
     * to this resource ought to use one of the enclosed URIs. Clients with link
     * editing capabilities ought to automatically re-link references to the
     * effective request URI (Section 5.5 of [RFC7230]) to one or more of the
     * new references sent by the server, where possible.
     *
     * The server should generate a Location header field ([RFC7231], Section
     * 7.1.2) in the response containing a preferred URI reference for the new
     * permanent URI. The user agent may use the Location field value for
     * automatic redirection. The server's response payload usually contains a
     * short hypertext note with a hyperlink to the new URI(s).
     *
     * A 308 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see [RFC7234],
     * Section 4.2.2).
     *
     * Note: This status code is similar to 301 (Moved Permanently) ([RFC7231],
     * Section 6.4.2), except that it does not allow changing the request method
     * from POST to GET.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7238.html#status.308
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const NOT_MODIFIED = 304;

    /**
     *
     * The 412 (Precondition Failed) status code indicates that one or more
     * conditions given in the request header fields evaluated to false when
     * tested on the server. This response code allows the client to place
     * preconditions on the current resource state (its current representations
     * and metadata) and, thus, prevent the request method from being applied if
     * the target resource is in an unexpected state.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/RFC7238.html#status.412
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const PRECONDITION_FAILED = 412;
}
