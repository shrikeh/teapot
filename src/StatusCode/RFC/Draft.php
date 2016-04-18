<?php
/**
 * Interface representing extended HTTP status codes for Draft codes. These
 * codes are represented as an interface so that developers may implement it and
 * then use parent::[CODE] to gain a code, or to extend the codes using
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
 * @copyright 2013 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */
namespace Teapot\StatusCode\RFC;

/**
 * Interface representing extended HTTP status codes for Draft codes. These
 * codes are represented as an interface so that developers may implement it and
 * then use parent::[CODE] to gain a code, or to extend the codes using
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
 * @copyright 2013 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */
interface Draft
{
    /**
     * The target resource has been assigned a new permanent URI and any
     * future references to this resource SHOULD use one of the returned
     * URIs.  Clients with link editing capabilities ought to automatically
     * re-link references to the effective request URI (Section 5.5 of
     * http://tools.ietf.org/html/draft-ietf-httpbis-p1-messaging) to one or
     * more of the new references returned by the server, where possible.
     *
     * Caches MAY use a heuristic (see
     * http://tools.ietf.org/html/draft-ietf-httpbis-p6-cache, Section 2.3.1.1)
     * to determine freshness for 308 responses.
     *
     * The new permanent URI SHOULD be given by the Location field in the
     * response (http://tools.ietf.org/html/draft-ietf-httpbis-p2-semantics,
     * Section 10.5).
     * A response payload can contain a short hypertext note with a hyperlink
     * to the new URI(s).
     *
     * Note: This status code is similar to 301 Moved Permanently, except that
     * it does not allow rewriting the request method from POST to GET.
     *
     * @codingStandardsIgnoreStart
     *
     * @link http://tools.ietf.org/html/draft-reschke-http-status-308-07#section-3
     * @codingStandardsIgnoreEnd
     *
     * @var int
     */
    const PERMANENT_REDIRECT = 308;
}
