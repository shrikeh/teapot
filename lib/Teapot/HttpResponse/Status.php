<?php
/**
 * Interface representing standard HTTP status codes. These codes are
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
namespace Teapot\HttpResponse;

use \ArrayAccess;

/**
 * Interface representing standard HTTP status codes. These codes are
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
class Status implements ArrayAccess
{
    protected $code;

    protected $message;

    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __get($var)
    {
        return $this->$var;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Render a valid HTTP response header that you can use with header()
     * directly.
     *
     * @return string
     */
    public function render()
    {
        $code    = $this->getCode();
        $message = $this->getMessage();

        return "HTTP/1.1 $code $message";
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @param string $var
     * @see \ArrayAccess::offsetGet()
     */
    public function offsetGet($var)
    {
        return $this->$var;
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetSet()
     * @param string $var
     * @param mixed $val
     * @throws \BadMethodCallException
     */
    public function offsetSet($var, $val)
    {
        throw new \BadMethodCallException(
            'The status object is immutable, values must be set at instantiation'
        );
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetUnset()
     * @param string $var
     * @throws \BadMethodCallException
     */
    public function offsetUnset($var)
    {
        throw new \BadMethodCallException(
            'The status object is immutable, values must be set at instantiation'
        );
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetExists()
     * @param string $var
     */
    public function offsetExists($var)
    {
        return (isset($this->$var));
    }
}
