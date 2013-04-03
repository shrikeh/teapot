<?php
namespace Tests\Teapot;

use \ArrayObject;
use \PHPUnit_Framework_TestCase as TestCase;
use \Teapot\HttpResponse;


class HttpResponseTest extends TestCase
{
    /**
     * Test that we get an instance of the HttpResponse object back and that it
     * is the smae instance when asked for again.
     *
     * @test
     * @group HttpResponse
     * @group Validator
     */
    public function testGetValidator()
    {
        $httpResponse = new HttpResponse();

        $this->assertInstanceOf(
            '\Teapot\HttpResponse\StatusCode\Validator\ValidatorInterface',
            $httpResponse->getValidator()
        );
    }

    /**
     * Test that we get an instance of the HttpResponse object back and that it
     * is the smae instance when asked for again.
     *
     * @test
     * @group HttpResponse
     */
    public function testStaticSingletonFactory()
    {
        $httpResponse = HttpResponse::getInstance();
        $this->assertInstanceOf('\Teapot\HttpResponse', $httpResponse);

        $this->assertSame($httpResponse, HttpResponse::getInstance());
    }


    /**
     * Test that the HttpResponse object can be used as an array
     * @test
     * @group HttpResponse
     */

    public function testArrayAccess()
    {
        $httpResponse = new HttpResponse();

        $result = $httpResponse[HttpResponse::OK];
        $this->assertNotNull($result);
    }


}
