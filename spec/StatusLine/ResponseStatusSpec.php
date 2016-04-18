<?php

namespace spec\Teapot\StatusLine;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Teapot\StatusCode\RFC\RFC2616;

class ResponseStatusSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            RFC2616::OK,
            'Ok',
            1.1
        );
    }

    function it_implements_statusline_interface()
    {
        $this->shouldHaveType('Teapot\StatusLine');
    }

    function it_gives_me_the_status_code()
    {
        $this->code()->shouldReturn(RFC2616::OK);
    }

    function it_gives_me_the_reason_phrase()
    {
        $this->reason()->shouldReturn('Ok');
    }

    function it_gives_me_the_http_version()
    {
        $this->version()->shouldReturn('1.1');
    }
}
