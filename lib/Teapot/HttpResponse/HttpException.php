<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Teapot
 * @subpackage HttpResponse
 */
namespace Teapot\HttpResponse;
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Teapot
 * @subpackage HttpResponse
 */
use \Teapot\HttpResponse\StatusCode;

class HttpResponseException extends \Exception implements StatusCode
{
    public function __construct($message, $errorCode)
    {

        parent::__construct($message, $errorCode);
    }
}
