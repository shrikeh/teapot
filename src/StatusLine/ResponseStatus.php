<?php

namespace Teapot\StatusLine;

use Teapot\StatusLine;

class ResponseStatus implements StatusLine
{
    private $code;

    private $reason;

    public function __construct($code, $reason)
    {
        $this->code = $code;
        $this->reason = $reason;
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

    }
}
