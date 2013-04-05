<?php
/**
 * Simple Exception to represent http-based Exceptions
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
namespace Teapot;

use \Teapot\StatusCode;

/**
 * Simple Exception to represent http-based Exceptions
 *
 * @category   StatusCode
 * @package    Teapot
 * @subpackage HttpResponse
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
class HttpException extends \Exception implements StatusCode
{
    /**
     * Constructor.
     *
     * @param string  $message    The exception message (status message)
     * @param integer $statusCode A valid response code
     */
    public function __construct($message, $statusCode)
    {
        // status code is optional in \Exception, but not in here.
        parent::__construct($message, $statusCode);
    }

    /**
     * Simple magic so you can use the Exception directly as a string, for
     * example in header();
     *
     * @return string A fully valid status header
     */
    public function __toString()
    {
        // I dislike functionality inside magic methods,
        // so this just proxies to render().
        return $this->render();
    }

    /**
     * Render the code and message (in whole or in part) as a valid
     * response status header.
     *
     * @param boolean $prependHttp Whether to prepend the HTTP/1.1 prefix
     *
     * @return string
     */
    public function render($prependHttp = true)
    {
        $string = $this->getCode() . ' ' . $this->getMessage();
        if ($prependHttp) {
            $string = 'HTTP/1.1 ' . $string;
        }
        return $string;
    }
}
