<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
namespace ShrikehHttp\Http;
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
use \ShrikehHttp\Http\StatusCode;

class HttpException extends \Exception implements StatusCode
{

}
