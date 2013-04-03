<?php
/**
 * Interface representing standard HTTP status codes. These codes are
 * represented as an interface so that developers may implement it and then use
 * parent::[CODE] to gain a code, or to extend the codes using static::[CODE]
 * and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * PHP version 5.3
 *
 * @category   StatusCode
 * @package    Teapot
 * @subpackage Tests
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
namespace TeapotTests\Teapot;

use \ArrayObject;
use \PHPUnit_Framework_TestCase as TestCase;
use \Teapot\HttpResponse;

/**
 * Interface representing standard HTTP status codes. These codes are
 * represented as an interface so that developers may implement it and then use
 * parent::[CODE] to gain a code, or to extend the codes using static::[CODE]
 * and override their default description.
 *
 * This allows for codes to be repurposed in a natural way where the core,
 * traditional use would not be meaningful.
 *
 * @category   StatusCode
 * @package    Teapot
 * @subpackage Tests
 * @author     Barney Hanlon <barney@shrikeh.net>
 * @copyright  2013 B Hanlon. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       http://shrikeh.github.com/teapot
 */
class HttpResponseTest extends TestCase
{
    /**
     * Test that we get an instance of the HttpResponse object back and that it
     * is the same instance when asked for again.
     *
     * @test
     * @group HttpResponse
     * @group Validator
     */
    public function testGetValidator()
    {
        $httpResponse = new HttpResponse();

        $this->assertInstanceOf(
            '\Teapot\HttpResponse\Status\StatusCode\Validator\ValidatorInterface',
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
     * Test that the HttpResponse object can be used as an array.
     *
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
