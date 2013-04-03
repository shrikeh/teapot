<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * PHP version 5.3
 *
 * @category   Exception
 * @package    Teapot
 * @subpackage HttpResponse
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
namespace Teapot\HttpResponse;

use \Teapot\HttpResponse\StatusCode;

/**
 * Simple Exception to represent http-based Exceptions
 *
 * @category   Exception
 * @package    Teapot
 * @subpackage HttpResponse
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
class HttpResponseException extends \Exception implements StatusCode
{
    /**
     * Constructor.
     *
     * @param string  $message   The exception message
     * @param integer $errorCode The exception (HTTP response) code
     */
    public function __construct($message, $errorCode)
    {
        parent::__construct($message, $errorCode);
    }
}
