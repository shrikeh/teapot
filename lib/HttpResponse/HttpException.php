<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package HttpResponse
 */
namespace HttpResponse;
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
use \HttpResponse\StatusCode;

class HttpException extends \Exception implements StatusCode
{

}
