<?php

namespace spec\Teapot;

use Teapot\HttpException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teapot\StatusCode\RFC\RFC7231;
use Teapot\StatusCodeException\InvalidStatusCodeException;

class HttpExceptionSpec extends ObjectBehavior
{
    function it_is_renderable()
    {
        $message = 'Forbidden';
        $code = RFC7231::FORBIDDEN;
        $this->beConstructedWith($message, $code);
        $this->render(false)->shouldReturn("$code $message");
    }

    function it_behaves_as_a_string()
    {
        $this->beConstructedWith('Expectation Failed', RFC7231::EXPECTATION_FAILED);
        $this->__toString()->shouldReturn('HTTP/1.1 417 Expectation Failed');
    }
}
