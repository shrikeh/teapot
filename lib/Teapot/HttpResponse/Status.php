<?php
namespace Teapot\HttpResponse;

use \ArrayAccess;
use \Teapot\HttpResponse\StatusCode;

class Status implements StatusCode, ArrayAccess
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
        return $this->message();
    }

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
        throw new \BadMethodCallException('The status object is immutable, values must be set at instantiation');
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
