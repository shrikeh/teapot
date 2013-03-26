<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
namespace Http;
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
use \Http\StatusCode;

class HttpException extends \Exception implements StatusCode
{

}
