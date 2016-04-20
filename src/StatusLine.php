<?php
/**
 * Interface representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616 and RFC 7231.
 *
 * PHP version 5.3
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @link      https://shrikeh.github.com/teapot
 */
namespace Teapot;

use Teapot\StatusCodeException\InvalidStatusCodeException;

/**
 * Interface representing a Value Object of the HTTP Status-Line, as
 * specified in RFC 2616 and RFC 7231.
 *
 * PHP version 5.3
 *
 * @category StatusLine
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 * @link      https://shrikeh.github.com/teapot
 */
class StatusLine
{
    private $code;

    private $reason;

    public function __construct($code, $reason)
    {
        $this->setCode($code);
        $this->reason   = $reason;
    }

    public final function code()
    {
        return $this->code;
    }

    public final function reason()
    {
        return $this->reason;
    }

    public final function version()
    {
        return $this->version;
    }

    private final function setCode($code)
    {
        if (!is_numeric($code)) {
            throw new InvalidStatusCodeException(
                 "Status code must be numeric, but received $code"
            );
        }
        $this->code = (int) $code;
    }

    public final function responseClass()
    {
        return (int) floor($this->code / 100);
    }

    public final function isInformational()
    {
        return ($this->responseClass() === StatusCode::INFORMATIONAL);
    }

    public final function isSuccessful()
    {
        return ($this->responseClass() === StatusCode::SUCCESSFUL);
    }

    public final function isRedirection()
    {
        return ($this->responseClass() === StatusCode::REDIRECTION);
    }

    public final function isClientError()
    {
        return ($this->responseClass() === StatusCode::CLIENT_ERROR);
    }

    public final function isServerError()
    {
        return ($this->responseClass() === StatusCode::SERVER_ERROR);
    }
}
