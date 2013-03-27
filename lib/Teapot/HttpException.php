<?php
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Teapot
 */
namespace Teapot;
/**
 * Simple Exception to represent http-based Exceptions
 *
 * @author Barney Hanlon <@shrikeh>
 * @package Http
 */
use \Teapot\StatusCode;

class HttpException extends \Exception implements StatusCode
{

}
