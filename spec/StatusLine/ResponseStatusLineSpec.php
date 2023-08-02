<?php

namespace spec\Teapot\StatusLine;

use PhpSpec\ObjectBehavior;
use Psr\Http\Message\ResponseInterface;
use Teapot\StatusCode;
use Teapot\StatusCodeException\InvalidStatusCodeException;
use Teapot\StatusLine;

class ResponseStatusLineSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->beConstructedWith(StatusCode::OK, 'OK');
        $this->shouldHaveType(StatusLine::class);
    }

    public function it_returns_a_status_code(): void
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith($code, 'Forbidden');
        $this->statusCode()->shouldReturn($code);
    }

    public function it_returns_the_status_code_class(): void
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith($code, 'Forbidden');
        $this->statusClass()->shouldReturn(StatusCode::CLIENT_ERROR);
    }

    public function it_returns_true_if_it_is_informational(): void
    {
        $code = StatusCode::SWITCHING_PROTOCOLS;
        $this->beConstructedWith($code, 'Switching Protocols');
        $this->isInformational()->shouldReturn(true);
    }

    public function it_returns_true_if_it_is_successful(): void
    {
        $code = StatusCode::CREATED;
        $this->beConstructedWith($code, 'Created');
        $this->isInformational()->shouldReturn(false);
        $this->isSuccessful()->shouldReturn(true);
    }

    public function it_returns_true_if_it_is_redirection(): void
    {
        $code = StatusCode::NOT_MODIFIED;
        $this->beConstructedWith($code, 'Not Modified');
        $this->isSuccessful()->shouldReturn(false);
        $this->isRedirection()->shouldReturn(true);
    }

    public function it_returns_true_if_it_is_a_client_error(): void
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith($code, 'Forbidden');
        $this->isRedirection()->shouldReturn(false);
        $this->isClientError()->shouldReturn(true);
    }

    public function it_returns_true_if_it_is_a_server_error(): void
    {
        $code = StatusCode::INTERNAL_SERVER_ERROR;
        $this->beConstructedWith($code, 'Forbidden');
        $this->isClientError()->shouldReturn(false);
        $this->isServerError()->shouldReturn(true);
    }

    public function it_returns_the_reason_phrase(): void
    {
        $reason = 'Forbidden';
        $this->beConstructedWith(StatusCode::FORBIDDEN, $reason);
        $this->reasonPhrase()->shouldReturn($reason);
    }

    public function it_throws_an_exception_if_the_code_is_not_numeric(): void
    {
        $this->beConstructedWith('Foo', 'Bar');
        $this->shouldThrow(InvalidStatusCodeException::class)
            ->duringInstantiation();
    }

    public function it_accepts_numeric_codes(): void
    {
        $code = StatusCode::FORBIDDEN;
        $this->beConstructedWith((string) $code, 'Bar');
        $this->statusCode()->shouldReturn($code);
    }

    public function it_throws_an_exception_if_the_code_is_below_100(): void
    {
        $this->beConstructedWith('099', 'Bar');
        $this->shouldThrow(InvalidStatusCodeException::class)
            ->duringInstantiation();
    }

    public function it_can_append_itself_to_a_psr_7_response(
        ResponseInterface $response1,
        ResponseInterface $response2,
    ): void {
        $code   = StatusCode::FORBIDDEN;
        $reason = 'Forbidden';
        $response1->withStatus($code, $reason)->willReturn($response2);
        $this->beConstructedWith($code, $reason);
        $this->response($response1)->shouldReturn($response2);
    }
}
