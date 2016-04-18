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
 * @link https://shrikeh.github.com/teapot
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
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */

interface RFC7231
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
   * @codingStandardsIgnoreStart
   *
   * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.100
   * @codingStandardsIgnoreEnd
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
   * @codingStandardsIgnoreStart
   *
   * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.101
   * @codingStandardsIgnoreEnd
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
     * @codingStandardsIgnoreStart
     *
     *  A 200 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see Section 4.2.2 of
     * {@link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7234.html#heuristic.freshness RFC7234}).
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.101
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const OK = 200;

    /**
     * The 201 (Created) status code indicates that the request has been
     * fulfilled and has resulted in one or more new resources being created.
     * The primary resource created by the request is identified by either a
     * Location header field in the response or, if no Location field is
     * received, by the effective request URI.¶
     *
     * The 201 response payload typically describes and links to the resource(s)
     * created. See Section 7.2 for a discussion of the meaning and purpose of
     * validator header fields, such as ETag and Last-Modified, in a 201
     * response.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.201
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const CREATED = 201;

    /**
     * The 202 (Accepted) status code indicates that the request has been
     * accepted for processing, but the processing has not been completed. The
     * request might or might not eventually be acted upon, as it might be
     * disallowed when processing actually takes place. There is no facility in
     * HTTP for re-sending a status code from an asynchronous operation.
     *
     * The 202 response is intentionally noncommittal. Its purpose is to allow a
     * server to accept a request for some other process (perhaps a
     * batch-oriented process that is only run once per day) without requiring
     * that the user agent's connection to the server persist until the process
     * is completed. The representation sent with this response ought to
     * describe the request's current status and point to (or embed) a status
     * monitor that can provide the user with an estimate of when the request
     * will be fulfilled.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.202
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const ACCEPTED = 202;

    /**
     * The 203 (Non-Authoritative Information) status code indicates that the
     * request was successful but the enclosed payload has been modified from
     * that of the origin server's 200 (OK) response by a transforming proxy
     * (Section 5.7.2 of [RFC7230]). This status code allows the proxy to notify
     * recipients when a transformation has been applied, since that knowledge
     * might impact later decisions regarding the content. For example, future
     * cache validation requests for the content might only be applicable along
     * the same request path (through the same proxies).
     *
     * The 203 response is similar to the Warning code of 214 Transformation
     * Applied (Section 5.5 of [RFC7234]), which has the advantage of being
     * applicable to responses with any status code.
     *
     * A 203 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see Section 4.2.2 of
     * [RFC7234]).
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.203
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const NON_AUTHORATIVE_INFORMATION = 203;

    /**
     * The 204 (No Content) status code indicates that the server has
     * successfully fulfilled the request and that there is no additional
     * content to send in the response payload body. Metadata in the response
     * header fields refer to the target resource and its selected
     * representation after the requested action was applied.¶
     *
     * For example, if a 204 status code is received in response to a PUT
     * request and the response contains an ETag header field, then the PUT was
     * successful and the ETag field-value contains the entity-tag for the new
     * representation of that target resource.
     *
     * The 204 response allows a server to indicate that the action has been
     * successfully applied to the target resource, while implying that the user
     * agent does not need to traverse away from its current "document view"
     * (if any). The server assumes that the user agent will provide some
     * indication of the success to its user, in accord with its own interface,
     * and apply any new or updated metadata in the response to its active
     * representation.
     *
     * For example, a 204 status code is commonly used with document editing
     * interfaces corresponding to a "save" action, such that the document being
     * saved remains available to the user for editing. It is also frequently
     * used with interfaces that expect automated data transfers to be
     * prevalent, such as within distributed version control systems.
     *
     * A 204 response is terminated by the first empty line after the header
     * fields because it cannot contain a message body.
     *
     * A 204 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see Section 4.2.2 of
     * [RFC7234]).
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.204
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const NO_CONTENT = 204;

    /**
     * The 205 (Reset Content) status code indicates that the server has
     * fulfilled the request and desires that the user agent reset the "document
     * view", which caused the request to be sent, to its original state as
     * received from the origin server.
     *
     * This response is intended to support a common data entry use case where
     * the user receives content that supports data entry (a form, notepad,
     * canvas, etc.), enters or manipulates data in that space, causes the
     * entered data to be submitted in a request, and then the data entry
     * mechanism is reset for the next entry so that the user can easily
     * initiate another input action.
     *
     * Since the 205 status code implies that no additional content will be
     * provided, a server must not generate a payload in a 205 response. In
     * other words, a server must do one of the following for a 205 response:
     * a) indicate a zero-length body for the response by including a
     * Content-Length header field with a value of 0;
     * b) indicate a zero-length payload for the response by including a
     * Transfer-Encoding header field with a value of chunked and a message body
     * consisting of a single chunk of zero-length; or,
     * c) close the connection immediately after sending the blank line
     * terminating the header section.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.205
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const RESET_CONTENT = 205;

    /**
     * The 300 (Multiple Choices) status code indicates that the target resource
     * has more than one representation, each with its own more specific
     * identifier, and information about the alternatives is being provided so
     * that the user (or user agent) can select a preferred representation by
     * redirecting its request to one or more of those identifiers. In other
     * words, the server desires that the user agent engage in reactive
     * negotiation to select the most appropriate representation(s) for its
     * needs (Section 3.4).
     *
     * If the server has a preferred choice, the server should generate a
     * Location header field containing a preferred choice's URI reference. The
     * user agent may use the Location field value for automatic redirection.
     *
     * For request methods other than HEAD, the server should generate a payload
     * in the 300 response containing a list of representation metadata and URI
     * reference(s) from which the user or user agent can choose the one most
     * preferred. The user agent may make a selection from that list
     * automatically if it understands the provided media type. A specific
     * format for automatic selection is not defined by this specification
     * because HTTP tries to remain orthogonal to the definition of its
     * payloads. In practice, the representation is provided in some easily
     * parsed format believed to be acceptable to the user agent, as determined
     * by shared design or content negotiation, or in some commonly accepted
     * hypertext format.
     *
     * A 300 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see Section 4.2.2 of
     * [RFC7234]).
     *
     * Note: The original proposal for the 300 status code defined the URI
     * header field as providing a list of alternative representations, such
     * that it would be usable for 200, 300, and 406 responses and be
     * transferred in responses to the HEAD method. However, lack of deployment
     * and disagreement over syntax led to both URI and Alternates (a subsequent
     * proposal) being dropped from this specification. It is possible to
     * communicate the list using a set of Link header fields [RFC5988], each
     * with a relationship of "alternate", though deployment is a
     * chicken-and-egg problem.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.300
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const MULTIPLE_CHOICES = 300;

    /**
     * The 301 (Moved Permanently) status code indicates that the target
     * resource has been assigned a new permanent URI and any future references
     * to this resource ought to use one of the enclosed URIs. Clients with
     * link-editing capabilities ought to automatically re-link references to
     * the effective request URI to one or more of the new references sent by
     * the server, where possible.
     *
     * The server should generate a Location header field in the response
     * containing a preferred URI reference for the new permanent URI. The user
     * agent may use the Location field value for automatic redirection. The
     * server's response payload usually contains a short hypertext note with a
     * hyperlink to the new URI(s).
     *
     * Note: For historical reasons, a user agent may change the request method
     * from POST to GET for the subsequent request. If this behavior is
     * undesired, the 307 (Temporary Redirect) status code can be used instead.
     *
     * A 301 response is cacheable by default; i.e., unless otherwise indicated
     * by the method definition or explicit cache controls (see Section 4.2.2 of
     * [RFC7234]).
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.301
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const MOVED_PERMANENTLY = 301;

    /**
     * The 302 (Found) status code indicates that the target resource resides
     * temporarily under a different URI. Since the redirection might be altered
     * on occasion, the client ought to continue to use the effective request
     * URI for future requests.
     *
     * The server should generate a Location header field in the response
     * containing a URI reference for the different URI. The user agent may use
     * the Location field value for automatic redirection. The server's response
     * payload usually contains a short hypertext note with a hyperlink to the
     * different URI(s).
     *
     * Note: For historical reasons, a user agent may change the request method
     * from POST to GET for the subsequent request. If this behavior is
     * undesired, the 307 (Temporary Redirect) status code can be used instead.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.302
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const FOUND = 302;

    /**
     * The 303 (See Other) status code indicates that the server is redirecting
     * the user agent to a different resource, as indicated by a URI in the
     * Location header field, which is intended to provide an indirect response
     * to the original request. A user agent can perform a retrieval request
     * targeting that URI (a GET or HEAD request if using HTTP), which might
     * also be redirected, and present the eventual result as an answer to the
     * original request. Note that the new URI in the Location header field is
     * not considered equivalent to the effective request URI.
     *
     * This status code is applicable to any HTTP method. It is primarily used
     * to allow the output of a POST action to redirect the user agent to a
     * selected resource, since doing so provides the information corresponding
     * to the POST response in a form that can be separately identified,
     * bookmarked, and cached, independent of the original request.
     *
     * A 303 response to a GET request indicates that the origin server does not
     * have a representation of the target resource that can be transferred by
     * the server over HTTP. However, the Location field value refers to a
     * resource that is descriptive of the target resource, such that making a
     * retrieval request on that other resource might result in a representation
     * that is useful to recipients without implying that it represents the
     * original target resource. Note that answers to the questions of what can
     * be represented, what representations are adequate, and what might be a
     * useful description are outside the scope of HTTP.
     *
     * Except for responses to a HEAD request, the representation of a 303
     * response ought to contain a short hypertext note with a hyperlink to the
     * same URI reference provided in the Location header field.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.303
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const SEE_OTHER = 303;

    /**
     * The 305 (Use Proxy) status code was defined in a previous version of this
     * specification and is now deprecated
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.305
     * @codingStandardsIgnoreEnd
     * @var int
     * @deprecated
     */
    const USE_PROXY = 305;

    /**
     * The 307 (Temporary Redirect) status code indicates that the target
     * resource resides temporarily under a different URI and the user agent
     * must not change the request method if it performs an automatic
     * redirection to that URI. Since the redirection can change over time, the
     * client ought to continue using the original effective request URI for
     * future requests.
     *
     * The server should generate a Location header field in the response
     * containing a URI reference for the different URI. The user agent may use
     * the Location field value for automatic redirection. The server's response
     * payload usually contains a short hypertext note with a hyperlink to the
     * different URI(s).
     *
     * Note: This status code is similar to 302 (Found), except that it does not
     * allow changing the request method from POST to GET. This specification
     * defines no equivalent counterpart for 301 (Moved Permanently) ([RFC7238],
     * however, defines the status code 308 (Permanent Redirect) for this
     * purpose).
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.307
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const TEMPORARY_REDIRECT = 307;

    /**
     * The 400 (Bad Request) status code indicates that the server cannot or
     * will not process the request due to something that is perceived to be a
     * client error (e.g., malformed request syntax, invalid request message
     * framing, or deceptive request routing).
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.400
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const BAD_REQUEST = 400;

    /**
     * The 402 (Payment Required) status code is reserved for future use.
     *
     * @codingStandardsIgnoreStart
     *
     * @link https://svn.tools.ietf.org/svn/wg/httpbis/specs/rfc7231.html#status.402
     * @codingStandardsIgnoreEnd
     * @var int
     */
    const PAYMENT_REQUIRED = 402;

    
/*

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
*/
}
