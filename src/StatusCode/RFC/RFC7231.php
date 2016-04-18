<?php
/**
 * Interface representing extended HTTP status codes for RFC7231. These codes
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
 * @copyright 2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link http://shrikeh.github.com/teapot
 */
namespace Teapot\StatusCode\RFC;

/**
 * Interface representing extended HTTP status codes for RFC7231. These codes
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

interface RFC7231 extends RFC2616
{

  /**
   * The 100 (Continue) status code indicates that the initial part of a request
   * has been received and has not yet been rejected by the server. The server
   * intends to send a final response after the request has been fully received
   * and acted upon.
   *
   * When the request contains an Expect header field that includes a
   * 100-continue expectation, the 100 response indicates that the server wishes
   * to receive the request payload body, as described in Section 5.1.1. The
   * client ought to continue sending the request and discard the 100 response.
   *
   * If the request did not contain an Expect header field containing the
   * 100-continue expectation, the client can simply discard this interim
   * response.
   *
   * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.100
   *
   * @var int
   */
  const CONTINUING = 100;

  /**
   * As 'continue' is a reserved word in PHP, we append an underscore, so
   * developers can decide whether to use CONTINUING or CONTINUE_ as their
   * preferred choice of constant.
   *
   * @see Teapot\StatusCode\RFC\RFC7231:CONTINUING
   * @var int
   */
  const CONTINUE_ = self::CONTINUING;

  /**
   * The 101 (Switching Protocols) status code indicates that the server
   * understands and is willing to comply with the client's request, via the
   * Upgrade header field (Section 6.7 of [RFC7230]), for a change in the
   * application protocol being used on this connection. The server must
   * generate an Upgrade header field in the response that indicates which
   * protocol(s) will be switched to immediately after the empty line that
   * terminates the 101 response.¶
   *
   * It is assumed that the server will only agree to switch protocols when it
   * is advantageous to do so. For example, switching to a newer version of HTTP
   * might be advantageous over older versions, and switching to a real-time,
   * synchronous protocol might be advantageous when delivering resources that
   * use such features.
   *
   * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.101
   *
   * @var int
   */
    const SWITCHING_PROTOCOLS = 101;

    /**
     * The 200 (OK) status code indicates that the request has succeeded. The
     * payload sent in a 200 response depends on the request method. For the
     * methods defined by this specification, the intended meaning of the
     * payload can be summarized as: ¶
     * - GET
     *   a representation of the target resource;
     * - HEAD
     *   the same representation as GET, but without the representation data;
     * - POST
     *   a representation of the status of, or results obtained from, the
     *   action;
     * - PUT, DELETE
     *   a representation of the status of the action;
     * - OPTIONS
     *   a representation of the communications options;
     * - TRACE
     *   a representation of the request message as received by the end server.
     *
     * Aside from responses to CONNECT, a 200 response always has a payload,
     * though an origin server may generate a payload body of zero length. If no
     * payload is desired, an origin server ought to send 204 (No Content)
     * instead. For CONNECT, no payload is allowed because the successful result
     * is a tunnel, which begins immediately after the 200 response header
     * section.
     *
     *  A 200 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see Section 4.2.2 of
     * {@link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7234.html#heuristic.freshness RFC7234}).
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.101
     *
     * @var int
     */
    const OK = 200;


  201	Created	Section 6.3.2
  202	Accepted	Section 6.3.3
  203	Non-Authoritative Information	Section 6.3.4
  204	No Content	Section 6.3.5
  205	Reset Content	Section 6.3.6
  206	Partial Content	Section 4.1 of [RFC7233]
  300	Multiple Choices	Section 6.4.1
  301	Moved Permanently	Section 6.4.2
  302	Found	Section 6.4.3
  303	See Other	Section 6.4.4
  304	Not Modified	Section 4.1 of [RFC7232]
  305	Use Proxy	Section 6.4.5
  307	Temporary Redirect	Section 6.4.7
  400	Bad Request	Section 6.5.1
  401	Unauthorized	Section 3.1 of [RFC7235]
  402	Payment Required	Section 6.5.2
  403	Forbidden	Section 6.5.3
  404	Not Found	Section 6.5.4
  405	Method Not Allowed	Section 6.5.5
  406	Not Acceptable	Section 6.5.6
  407	Proxy Authentication Required	Section 3.2 of [RFC7235]
  408	Request Timeout	Section 6.5.7
  409	Conflict	Section 6.5.8
  410	Gone	Section 6.5.9
  411	Length Required	Section 6.5.10
  412	Precondition Failed	Section 4.2 of [RFC7232]
  413	Payload Too Large	Section 6.5.11
  414	URI Too Long	Section 6.5.12
  415	Unsupported Media Type	Section 6.5.13
  416	Range Not Satisfiable	Section 4.4 of [RFC7233]
  417	Expectation Failed	Section 6.5.14
  426	Upgrade Required	Section 6.5.15
  500	Internal Server Error	Section 6.6.1
  501	Not Implemented	Section 6.6.2
  502	Bad Gateway	Section 6.6.3
  503	Service Unavailable	Section 6.6.4
  504	Gateway Timeout	Section 6.6.5
  505	HTTP Version Not Supported	Section 6.6.6
}
