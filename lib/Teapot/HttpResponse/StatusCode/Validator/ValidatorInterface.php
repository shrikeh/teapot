<?php
/**
 * Validator interface for HTTP response codes.
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
namespace Teapot\HttpResponse\StatusCode\Validator;

interface ValidatorInterface
{
    /**
    * Check that a status code is valid.
    *
    * @param integer $statusCode
    */
    public function isValid($statusCode);
}
