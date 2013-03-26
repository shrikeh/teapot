<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
namespace Shrikeh\Http;
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
use \Shrikeh\Http\StatusCode;

class HttpException extends \Exception implements StatusCode
{

}
