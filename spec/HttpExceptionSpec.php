<?php

namespace spec\Teapot;

use PhpSpec\ObjectBehavior;
use Teapot\StatusCode\RFC\RFC7231;

class HttpExceptionSpec extends ObjectBehavior
{
    public function it_is_renderable(): void
    {
        $message = 'Forbidden';
        $code    = RFC7231::FORBIDDEN;
        $this->beConstructedWith($message, $code);
        $this->render(false)->shouldReturn("{$code} {$message}");
    }

    public function it_behaves_as_a_string(): void
    {
        $this->beConstructedWith('Expectation Failed', RFC7231::EXPECTATION_FAILED);
        $this->__toString()->shouldReturn('HTTP/1.1 417 Expectation Failed');
    }
}
