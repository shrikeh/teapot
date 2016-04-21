<?php

namespace spec\Teapot;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Teapot\StatusCode;
use Teapot\StatusCodeException\InvalidStatusCodeException;

class StatusLineSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->beConstructedWith(StatusCode::OK, 'OK');
        $this->shouldHaveType('Teapot\StatusLine');
    }

    function it_returns_a_code()
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith($code, 'Forbidden');
        $this->code()->shouldReturn($code);
    }

    function it_returns_the_response_code_class()
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith($code, 'Forbidden');
        $this->responseClass()->shouldReturn(StatusCode::CLIENT_ERROR);
    }

    function it_returns_true_if_it_is_informational()
    {
        $code = StatusCode::SWITCHING_PROTOCOLS;
        $this->beConstructedWith($code, 'Switching Protocols');
        $this->isInformational()->shouldReturn(true);
    }

    function it_returns_true_if_it_is_successful()
    {
        $code = StatusCode::CREATED;
        $this->beConstructedWith($code, 'Created');
        $this->isInformational()->shouldReturn(false);
        $this->isSuccessful()->shouldReturn(true);
    }

    function it_returns_true_if_it_is_redirection()
    {
        $code = StatusCode::NOT_MODIFIED;
        $this->beConstructedWith($code, 'Not Modified');
        $this->isSuccessful()->shouldReturn(false);
        $this->isRedirection()->shouldReturn(true);
    }

    function it_returns_true_if_it_is_a_client_error()
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith($code, 'Forbidden');
        $this->isRedirection()->shouldReturn(false);
        $this->isClientError()->shouldReturn(true);
    }

    function it_returns_true_if_it_is_a_server_error()
    {
        $code = StatusCode::INTERNAL_SERVER_ERROR;
        $this->beConstructedWith($code, 'Forbidden');
        $this->isClientError()->shouldReturn(false);
        $this->isServerError()->shouldReturn(true);
    }

    function it_returns_the_reason()
    {
        $reason = 'Forbidden';
        $this->beConstructedWith(StatusCode::FORBIDDEN, $reason);
        $this->reason()->shouldReturn($reason);
    }

    function it_throws_an_exception_if_the_code_is_not_numeric()
    {
        $this->beConstructedWith('Foo', 'Bar');
        $this->shouldThrow('Teapot\StatusCodeException\InvalidStatusCodeException')
            ->duringInstantiation();
    }

    function it_accepts_numeric_codes()
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith((string) $code, 'Bar');
        $this->code()->shouldReturn($code);
    }

    function it_throws_an_exception_if_the_code_is_below_100()
    {
        $this->beConstructedWith('099', 'Bar');
        $this->shouldThrow('Teapot\StatusCodeException\InvalidStatusCodeException')
            ->duringInstantiation();
    }

}
