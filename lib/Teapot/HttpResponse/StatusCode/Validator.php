<?php
/**
 * Validator for HTTP response codes.
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
namespace Teapot\HttpResponse\StatusCode;

use \InvalidArgumentException;
use \Teapot\HttpResponse\StatusCode\Validator\ValidatorInterface;
/**
 * Validator for HTTP response codes.
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
class Validator implements ValidatorInterface
{
    /**
     * Storage for the error codes and constants.
     *
     * @var \ArrayAccess An object to store error codes in
     */
    protected $storage;

    public function __construct(\ArrayAccess $storage = null)
    {
        $this->storage = $storage;
    }

    /**
     * Validate a response code to see if it is a W3C-approved status code.
     *
     * @param integer $code The status code to validate
     * @return bool
     */
    public function isValid($code)
    {
        if (!is_integer($code)) {
            throw new \InvalidArgumentException('Status code must be an integer');
        }
        $storage = $this->getStorage();

        return $storage->offsetExists($code);
    }

    /**
     * Simple getter to fetch the error code storage.
     *
     * @return \Iterator
     */
    public function getStorage()
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
}
