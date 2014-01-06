<?php
/**
 * Interface representing extended HTTP status codes for Microsoft. These codes are
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
namespace Teapot\StatusCode;

/**
 * Interface representing extended HTTP status codes for Microsoft. These codes are
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

interface WebDAV
{

    /**
     * The 424 (Failed Dependency) status code means that the method could not
     * be performed on the resource because the requested action
     * depended on another action and that action failed. For example, if a
     * command in a PROPPATCH method fails then, at minimum, the rest
     * of the commands will also fail with 424 (Failed Dependency).
     *
     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
     * @var integer
     */
    const FAILED_DEPENDENCY = 424;

    /**
     * Unordered Collection (Internet draft).
     *
     * The 425 (Unordered Collection) status code indicates that the client
     * attempted to set the position of an internal collection member in an
     * unordered collection or in a collection with a server-maintained ordering.
     * Defined in drafts of "WebDAV Advanced Collections Protocol", but not present
     * in  "Web Distributed Authoring and Versioning (WebDAV) Ordered Collections Protocol".
     *
     * @see https://tools.ietf.org/html/draft-ietf-webdav-collection-protocol-04#section-7.2
     * @var integer
     */
    const UNORDERED_COLLECTION = 425;


    /**
     * The 506 (Loop Detected) status code indicates that the server detected
     * an infinite loop while processing a request with "Depth: infinity".
     *
     * @see https://tools.ietf.org/html/draft-ietf-webdav-collection-protocol-04#section-7.1
     * @var integer
     */
    const LOOP_DETECTED = 506;
}
