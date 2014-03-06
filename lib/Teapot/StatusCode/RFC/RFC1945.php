<?php
/**
 * Interface representing extended HTTP status codes for RFC2616. These codes are
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
 * Interface representing extended HTTP status codes for RFC1945. These codes are
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
 * @author     Christopher Hoult <choult@choult.com>
 * @copyright  2014 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 * @see        http://www.w3.org/Protocols/rfc1945/rfc1945
 */

interface RFC1945
{

    /**
     * The request has succeeded. The information returned with the
     * response is dependent on the method used in the request, as follows:
     * GET  an entity corresponding to the requested resource is sent
     *      in the response;
     * HEAD the response must only contain the header information and
     *      no Entity-Body;
     * POST an entity describing or containing the result of the action.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.2)
     * @var integer
     */
    const OK = 200;

    /**
     * The request has been fulfilled and resulted in a new resource being
     * created. The newly created resource can be referenced by the URI(s)
     * returned in the entity of the response. The origin server should
     * create the resource before using this Status-Code. If the action
     * cannot be carried out immediately, the server must include in the
     * response body a description of when the resource will be available;
     * otherwise, the server should respond with 202 (accepted).
     *
     * Of the methods defined by this specification, only POST can create a
     * resource.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.2)
     * @var integer
     */
    const CREATED = 201;

    /**
     * The request has been accepted for processing, but the processing
     * has not been completed. The request may or may not eventually be
     * acted upon, as it may be disallowed when processing actually takes
     * place. There is no facility for re-sending a status code from an
     * asynchronous operation such as this.
     *
     * The 202 response is intentionally non-committal. Its purpose is to
     * allow a server to accept a request for some other process (perhaps
     * a batch-oriented process that is only run once per day) without
     * requiring that the user agent's connection to the server persist
     * until the process is completed. The entity returned with this
     * response should include an indication of the request's current
     * status and either a pointer to a status monitor or some estimate of
     * when the user can expect the request to be fulfilled.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.2)
     * @var integer
     */
    const ACCEPTED = 202;

    /**
     * The server has fulfilled the request but there is no new
     * information to send back. If the client is a user agent, it should
     * not change its document view from that which caused the request to
     * be generated. This response is primarily intended to allow input
     * for scripts or other actions to take place without causing a change
     * to the user agent's active document view. The response may include
     * new metainformation in the form of entity headers, which should
     * apply to the document currently in the user agent's active view.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.2)
     * @var integer
     */
    const NO_CONTENT = 204;

    /**
     * This response code is not directly used by HTTP/1.0 applications,
     * but serves as the default for interpreting the 3xx class of
     * responses.
     *
     * The requested resource is available at one or more locations.
     * Unless it was a HEAD request, the response should include an entity
     * containing a list of resource characteristics and locations from
     * which the user or user agent can choose the one most appropriate.
     * If the server has a preferred choice, it should include the URL in
     * a Location field; user agents may use this field value for
     * automatic redirection.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.3)
     * @var integer
     */
    const MULTIPLE_CHOICES = 300;

    /**
     * The requested resource has been assigned a new permanent URL and
     * any future references to this resource should be done using that
     * URL. Clients with link editing capabilities should automatically
     * relink references to the Request-URI to the new reference returned
     * by the server, where possible.
     *
     * The new URL must be given by the Location field in the response.
     * Unless it was a HEAD request, the Entity-Body of the response
     * should contain a short note with a hyperlink to the new URL.
     *
     * If the 301 status code is received in response to a request using
     * the POST method, the user agent must not automatically redirect the
     * request unless it can be confirmed by the user, since this might
     * change the conditions under which the request was issued.
     *
     *      Note: When automatically redirecting a POST request after
     *      receiving a 301 status code, some existing user agents will
     *      erroneously change it into a GET request.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.3)
     * @var integer
     */
    const MOVED_PERMANENTLY = 301;

    /**
     * The requested resource resides temporarily under a different URL.
     * Since the redirection may be altered on occasion, the client should
     * continue to use the Request-URI for future requests.
     *
     * The URL must be given by the Location field in the response. Unless
     * it was a HEAD request, the Entity-Body of the response should
     * contain a short note with a hyperlink to the new URI(s).
     *
     * If the 302 status code is received in response to a request using
     * the POST method, the user agent must not automatically redirect the
     * request unless it can be confirmed by the user, since this might
     * change the conditions under which the request was issued.
     *
     *      Note: When automatically redirecting a POST request after
     *      receiving a 302 status code, some existing user agents will
     *      erroneously change it into a GET request.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.3)
     * @var integer
     */
    const MOVED_TEMPORARILY = 302;

    /**
     * If the client has performed a conditional GET request and access is
     * allowed, but the document has not been modified since the date and
     * time specified in the If-Modified-Since field, the server must
     * respond with this status code and not send an Entity-Body to the
     * client. Header fields contained in the response should only include
     * information which is relevant to cache managers or which may have
     * changed independently of the entity's Last-Modified date. Examples
     * of relevant header fields include: Date, Server, and Expires. A
     * cache should update its cached entity to reflect any new field
     * values given in the 304 response.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.3)
     * @var integer
     */
    const NOT_MODIFIED = 304;

    /**
     * The request could not be understood by the server due to malformed
     * syntax. The client should not repeat the request without
     * modifications.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.4)
     * @var integer
     */
    const BAD_REQUEST = 400;

    /**
     * The request requires user authentication. The response must include
     * a WWW-Authenticate header field (Section 10.16) containing a
     * challenge applicable to the requested resource. The client may
     * repeat the request with a suitable Authorization header field
     * (Section 10.2). If the request already included Authorization
     * credentials, then the 401 response indicates that authorization has
     * been refused for those credentials. If the 401 response contains
     * the same challenge as the prior response, and the user agent has
     * already attempted authentication at least once, then the user
     * should be presented the entity that was given in the response,
     * since that entity may include relevant diagnostic information. HTTP
     * access authentication is explained in Section 11.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.4)
     * @var integer
     */
    const UNAUTHORIZED = 401;

    /**
     * The server understood the request, but is refusing to fulfill it.
     * Authorization will not help and the request should not be repeated.
     * If the request method was not HEAD and the server wishes to make
     * public why the request has not been fulfilled, it should describe
     * the reason for the refusal in the entity body. This status code is
     * commonly used when the server does not wish to reveal exactly why
     * the request has been refused, or when no other response is
     * applicable.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.4)
     * @var integer
     */
    const FORBIDDEN = 403;

    /**
     * The server has not found anything matching the Request-URI. No
     * indication is given of whether the condition is temporary or
     * permanent. If the server does not wish to make this information
     * available to the client, the status code 403 (forbidden) can be
     * used instead.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.4)
     * @var integer
     */
    const NOT_FOUND = 404;

    /**
     * The server encountered an unexpected condition which prevented it
     * from fulfilling the request.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.5)
     * @var integer
     */
    const INTERNAL_SERVER_ERROR = 500;

    /**
     * The server does not support the functionality required to fulfill
     * the request. This is the appropriate response when the server does
     * not recognize the request method and is not capable of supporting
     * it for any resource.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.5)
     * @var integer
     */
    const NOT_IMPLEMENTED = 501;

    /**
     * The server, while acting as a gateway or proxy, received an invalid
     * response from the upstream server it accessed in attempting to
     * fulfill the request.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.5)
     * @var integer
     */
    const BAD_GATEWAY = 502;

    /**
     * The server is currently unable to handle the request due to a
     * temporary overloading or maintenance of the server. The implication
     * is that this is a temporary condition which will be alleviated
     * after some delay.
     *
     *      Note: The existence of the 503 status code does not imply
     *      that a server must use it when becoming overloaded. Some
     *      servers may wish to simply refuse the connection.
     *
     * @see http://www.w3.org/Protocols/rfc1945/rfc1945 (Subsection 9.5)
     * @var integer
     */
    const SERVICE_UNAVAILABLE = 503;
}
