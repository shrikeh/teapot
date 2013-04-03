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
namespace Teapot;

use \ArrayAccess;
use \ArrayObject;
use \IteratorAggregate;
use \OutOfRangeException;
use \Teapot\HttpResponse\HttpResponseException;
use \Teapot\HttpResponse\StatusCode;
use \Teapot\HttpResponse\StatusCode\Validator;
use \Teapot\HttpResponse\StatusCode\Validator\ValidatorInterface;

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
class HttpResponse implements StatusCode, ArrayAccess, IteratorAggregate
{

    protected $statusStorage;

    /**
     * An instance of a status code validator.
     *
     * @var \Teapot\HttpResponse\StatusCode\ValidatorInterface
     */
    protected $validator;

    /**
     * Holder for static singleton method of using Teapot.
     * Not recommended, but may help legacy code.
     *
     * @var \Teapot\HttpResponse
     */
    protected static $instance;

    /**
     *
     * @var string
     */
    protected $exceptionClass = '\Teapot\HttpResponse\HttpResponseException';

    /**
     * I'm not a big fan of static singletons, but some people like them,
     * and the role of this library is to make life easier, so for completeness
     * a static singleton factory is included.
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

    /**
     * Constructor.
     * @param array | null $statusCodes
     * @param string $validator
     * @param string $exceptionClass
     */
    public function __construct(
        $statusCodes = null,
        ValidatorInterface $validator = null,
        $exceptionClass = null
    )
    {

    }

    /**
     * Method overloading so you can go $httpResponse->movedPermanently() or
     * $httpResponse->moved_permanently() and still get a valid Status object.
     *
     * @param string $method
     * @param string $vars
     */
    public function __call($method, $vars)
    {
        $constant = $this->normalizeConstant($method);
    }

    /**
     * Method overloading so you can go $httpResponse->movedPermanently or
     * $httpResponse->moved_permanently
     *
     * @param string $var
     */
    public function __set($var, $message)
    {
        $constant = $this->normalizeConstant($var);
    }

    /**
     * Method overloading so you can go $httpResponse->movedPermanently or
     * $httpResponse->moved_permanently
     *
     * @param string $var
     */
    public function __get($var)
    {
        $constant = $this->normalizeConstant($var);
    }

    /**
     * Take a camel-cased or underscored name and turn it into a constant.
     *
     * @param string $constant
     * @return string the normalized constant name in upper case
     */
    protected function normalizeConstant($constant)
    {
        return preg_replace(
            '/([A-Z])([A-Z][a-z])|([a-z0-9])([A-Z])/',
            "$1$3_$2$4",
            $constant
        );
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

    /**
     * Set the message associated with this response code.
     *
     * @param integer $statusCode
     * @throws OutOfRangeException
     * @return string
     */
    public function setMessage($statusCode, $message)
    {
        if (!$this->isValid($statusCode)) {
            throw new OutOfRangeException(
                StatusCode::NOT_FOUND,
                'The status code is not valid'
            );
        }
        return $this->getIterator()->offsetSet($statusCode, $message);
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
        if (!$this->statusStorage) {
            $this->statusStorage = new ArrayObject(array());
            // reflection is costly, so we try and do this only once.
            $reflector = new \ReflectionClass('\Teapot\HttpResponse\StatusCode');

            foreach ($reflector->getConstants() as $constant => $statusCode) {
                $this->statusStorage->offsetSet($statusCode, $constant);
            }
        }
        return $this->statusStorage;
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetExists()
     * @param integer $statusCode
     * @return boolean
     */
    public function offsetExists($statusCode)
    {
        return $this->isValid($statusCode);
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetUnset()
     * @param integer $statusCode
     * @return string The status message
     */
    public function offsetGet($statusCode)
    {
        return $this->getMessage($statusCode);
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetSet()
     * @param integer $statusCode The status code.
     * @param string $message The status message
     */
    public function offsetSet($statusCode, $message)
    {
        return $this->setMessage($statusCode, $message);
    }

    /**
     * Implementation of ArrayAccess interface.
     *
     * @see \ArrayAccess::offsetUnset()
     * @param integer $statusCode
     */
    public function offsetUnset($statusCode)
    {
        return $this->getIterator()->offsetUnset($statusCode);
    }
}
