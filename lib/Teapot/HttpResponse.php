<?php
namespace Teapot;

use \ArrayAccess;
use \IteratorAggregate;
use \OutOfRangeException;
use \Teapot\HttpResponse\HttpResponseException;
use \Teapot\HttpResponse\StatusCode;
use \Teapot\HttpResponse\StatusCode\Validator;

class HttpResponse implements StatusCode, ArrayAccess, IteratorAggregate
{
    protected $storage;

    protected $validator;

    protected static $instance;

    /**
     *
     * @var string
     */
    protected $exceptionClass = '\Teapot\HttpResponse\HttpResponseException';


    /**
     *
     * @return \Teapot\HttpResponse
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function __construct()
    {

    }

    /**
     *
     * @param string $var
     */
    public function __get($var)
    {

    }


    /**
     * Helper method to proxy to the validator instance.
     *
     * @param integer $statusCode
     */
    public function isValid($statusCode)
    {
        return $this->getValidator()->isValid($statusCode);
    }


    /**
     * Return (or instantiate, and then return) a status code validator.
     *
     * @return \Teapot\HttpResponse\StatusCode\Validator\ValidatorInterface
     */
    public function getValidator()
    {
        if (!isset($this->validator)) {
            $this->validator = new Validator($this->getIterator());
        }
        return $this->validator;
    }

    /**
     * Look up the message associated with this response code.
     *
     * @param integer $statusCode
     * @throws OutOfRangeException
     * @return string
     */
    public function getMessage($statusCode)
    {
        if (!$this->isValid($statusCode)) {
            throw new OutOfRangeException(StatusCode::NOT_FOUND, 'The status code is not valid');
        }
        return 'OK';
    }


    public function setMessage($statusCode, $message)
    {
        if (!$this->isValid($statusCode)) {
            throw new OutOfRangeException(StatusCode::NOT_FOUND, 'The status code is not valid');
        }
        $this->getIterator()->offsetSet($statusCode, $message);
    }


    /**
     * Instantiate an HttpResponseException with pre-loaded response code and message.
     *
     * @param string $code
     * @param string $message
     * @return \Teapot\HttpResponse\HttpResponseException | \Exception
     */
    public function getException($code, $message = null)
    {
        if (null === $message) {
            $message = $this->getMessage($code);
        }
        return new $this->exceptionClass($code, $message);
    }

    /**
     * Instantiate and throw an HttpResponseException exception.
     *
     * @param integer $code
     * @param string $message
     * @throws \Teapot\HttpResponse\HttpResponseException | \Exception
     */
    public function throwException($code, $message = null)
    {
        throw $this->getException($code, $message);
    }

    /**
     * Get the iterator (storage) for the status codes.
     *
     * @return \ArrayAccess
     */

    public function getIterator()
    {
        if (!$this->storage) {
            $this->storage = new \ArrayObject(array());
            // reflection is costly, so we try and do this only once.
            $reflector = new \ReflectionClass('\Teapot\HttpResponse\StatusCode');

            foreach ($reflector->getConstants() as $constant => $statusCode) {
                $this->storage->offsetSet($statusCode, $constant);
            }
        }
        return $this->storage;
    }


    public function offsetExists($statusCode)
    {
        return $this->isValid($statusCode);
    }

    public function offsetGet($statusCode)
    {
        return $this->getMessage($statusCode);
    }

    public function offsetSet($statusCode, $message)
    {
        return $this->setMessage($statusCode, $message);
    }

    public function offsetUnset($statusCode)
    {
        $this->getIterator()->offsetUnset($statusCode);
    }
}
