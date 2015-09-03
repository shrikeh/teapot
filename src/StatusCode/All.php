<?php
/**
 * Interface representing extended HTTP status codes for Web servers. These codes are
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

use Teapot\StatusCode\RFC\Draft;
use Teapot\StatusCode\RFC\PEP;
use Teapot\StatusCode\RFC\RFC2295 as ContentNegotiation;
use Teapot\StatusCode\RFC\RFC2324 as HyperTextCoffeePotControlProtocol;
use Teapot\StatusCode\RFC\RFC2326 as Rtsp;
use Teapot\StatusCode\RFC\RFC2817 as TLS;
use Teapot\StatusCode\RFC\RFC3229 as HttpDeltas;

/**
 * Interface representing extended HTTP status codes. These codes are
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

interface All extends
    Vendor,
    WebDAV,
    Draft,
    PEP,
    ContentNegotiation,
    HyperTextCoffeePotControlProtocol,
    Rtsp,
    Http,
    TLS,
    HttpDeltas
{

}
