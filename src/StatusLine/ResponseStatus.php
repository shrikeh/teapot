<?php
/**
 * Interface representing extended HTTP status codes for RFC2616. These codes
 * are represented as an interface so that developers may implement it and then
 * use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * PHP version 5.3
 *
 * @category StatusCode
 *
 * @package Teapot\StatusLine
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */
namespace Teapot\StatusLine;

use Teapot\StatusLine;

/**
 * Interface representing extended HTTP status codes for RFC2616. These codes
 * are represented as an interface so that developers may implement it and then
 * use parent::[CODE] to gain a code, or to extend the codes using
 * static::[CODE] and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * PHP version 5.3
 *
 * @category StatusCode
 *
 * @package Teapot\StatusLine
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @link https://shrikeh.github.com/teapot
 */
class ResponseStatus implements StatusLine
{
    private $code;

    private $reason;

    /**
     * Constructor.
     *
     * @param integer $code   The status code
     * @param string  $reason The reason
     */
    public function __construct($code, $reason)
    {
        $this->code = $code;
        $this->reason = $reason;
    }

    /**
     * Return the status code.
     *
     * @return integer
     */
    final public function code()
    {
        return $this->code;
    }

    /**
     * Return the status reason.
     *
     * @return string
     */
    final public function reason()
    {
        return $this->reason;
    }
}
