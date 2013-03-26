php-http
========

This is a very simple library that aims to aid verbosity in any Web-based application by defining clearly the HTTP 1.1 response codes as constants. It includes two files: an interface, which contains the constants, and an exception specifically for HTTP.

## Using the StausCodes interface

Assuming for a moment a PHPUnit test on a cURL client response:

    <?php

    /**
     * @test
     * @dataProvider someUrlProvider
     **/
    public function testResponseIsOK($url)
    {
        $client = new Client($url);
        $response = $client->get();
        $this->assertEquals(200, $response->getStatusCode());
    }

This becomes:

    <?php
    use \Shrikeh\Http\StatusCode;
    ...
    $this->assertEquals(StatusCode:OK, $response->getStatusCode());

While this is a trivial example, the additional verbosity of the code is clearer with other HTTP status codes:

    <?php
    use \Shrikeh\Http\StatusCode;

    $this->assertEquals(StatusCode:NOT_FOUND, $response->getStatusCode());
    $this->assertEquals(StatusCode:FORBIDDEN, $response->getStatusCode());
    $this->assertEquals(StatusCode:MOVED_PERMANENTLY, $response->getStatusCode());
    $this->assertEquals(StatusCode:CREATED, $response->getStatusCode());

As `StatusCode` is an interface without any methods, you can directly implement it if you prefer:

    <?php

    class FooController implements \Http\StatusCode
    {

        public function badAction()
        {
            if ($this->request->getMethod() == 'POST') {
                throw new \Exception('Bad!', self::METHOD_NOT_ALLOWED);
            }
        }
    }

This may be beneficial in an abstract class, so that child classes don't need to explicitly use the interface.

All constants have doc blocks that use the official W3C descriptions of the status code, to aid IDEs and for reference.

## Using the HttpException

The `HttpException` is very straightforward. It simply is a named exception to aid verbosity:


    <?php

    use Shrikeh\Http\HttpException;
    use Shrikeh\Http\StatusCode;

    throw new HttpException('Sorry this page does not exist!', StatusCode::NOT_FOUND);

The exception itself uses the `StatusCode` interface, allowing you to avoid manually and explicitly importing it if you prefer:

    <?php

    use \Http\HttpException;

    throw new HttpException('Sorry this page does not exist!', HttpException::NOT_FOUND);

## Coding Standards

The entire library is intended to be [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md "PSR-0"), [PSR-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md "PSR-1") and [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md "PSR-2") compliant.

