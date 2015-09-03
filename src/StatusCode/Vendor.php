<?php
/**
 * Interface representing extended HTTP status codes for vendor-specific codes.
 * These codes are represented as an interface so that developers may implement it
 * and then use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
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

use Teapot\StatusCode\Vendor\Apache;
use Teapot\StatusCode\Vendor\Microsoft;
use Teapot\StatusCode\Vendor\Nginx;
use Teapot\StatusCode\Vendor\Twitter;

/**
 * Interface representing extended HTTP status codes for vendor-specific codes.
 * These codes are represented as an interface so that developers may implement it
 * and then use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
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

interface Vendor extends Apache, Microsoft, Nginx, Twitter
{

}
