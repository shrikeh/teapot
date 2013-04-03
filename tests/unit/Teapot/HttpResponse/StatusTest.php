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

use \PHPUnit_Framework_TestCase as TestCase;
use \Teapot\HttpResponse\Status;
use \Teapot\HttpResponse\Status\StatusCode;

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
class StatusTest extends TestCase
{
    /**
    * Test the various getters to make a Status helpful.
    *
    * @test
    */
    public function testGetValues()
    {
        $code = StatusCode::OK;
        $message = 'Foo';
        $status = new Status($code, $message);

        $this->assertEquals($code, $status->getCode());
        $this->assertEquals($code, $status->code);
        $this->assertEquals($code, $status['code']);

        $this->assertEquals($message, $status->getMessage());
        $this->assertEquals($message, $status->message);
        $this->assertEquals($message, $status['message']);
    }

    /**
     * @test
     */
    public function testRender()
    {
        $code = StatusCode::OK;
        $message = 'Foo';
        $status = new Status($code, $message);

        $this->assertEquals("HTTP/1.1 $code $message", $status->render());
        $this->assertEquals("HTTP/1.1 $code $message", (string) $status);
    }
}
