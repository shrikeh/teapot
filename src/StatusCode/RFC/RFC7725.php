<?php

namespace Teapot\StatusCode\RFC;

/**
 * Interface representing extended HTTP status codes for RFC7725. These codes
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
 * @copyright 2013 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link http://shrikeh.github.com/teapot
 */
interface RFC7725
{
    /**
     * This status code indicates that the server is subject to legal
     * restrictions which prevent it servicing the request.
     *
     * Since such restrictions typically apply to all operators in a legal
     * jurisdiction, the server in question may or may not be an origin
     * server.  The restrictions typically most directly affect the
     * operations of ISPs and search engines.
     *
     * Responses using this status code SHOULD include an explanation, in
     * the response body, of the details of the legal restriction; which
     * legal authority is imposing it, and what class of resources it
     * applies to.
     *
     * @codingStandardsIgnoreStart
     *
     * @link http://tools.ietf.org/html/draft-tbray-http-legally-restricted-status-00#section-3
     * @codingStandardsIgnoreEnd
     *
     * @var int
     */
    const UNAVAILABLE_FOR_LEGAL_REASONS = 451;
}
