<?php
namespace TeapotTests\Teapot\HttpResponse\Status\StatusCode;

use \ArrayObject;
use \PHPUnit_Framework_TestCase as TestCase;
use \Teapot\HttpResponse\Status\StatusCode\Validator;

class ValidatorTest extends TestCase
{

    public function providerStatusCodes()
    {
        return array(
            array(200, true),
            array(201, true),
            array(416, true),
            array(9000, false)
        );
    }

    /**
     * @test
     * @group Validator
     * @group StatusCode
     * @covers \Teapot\HttpResponse\Status\StatusCode\Validator::isValid()
     * @dataProvider providerStatusCodes
     * @param integer The status code
     * @param boolean Expected return value from the validator.
     */
    public function testValidation($code, $expected)
    {
        $validator = new Validator();
        $this->assertEquals($expected, $validator->isValid($code));
    }

    /**
     * @test
     * @group Validator
     * @group StatusCode
     * @covers \Teapot\HttpResponse\Status\StatusCode\Validator::getStorage()
     */
    public function testGetStorage()
    {
        $validator = new Validator();
        $storage = $validator->getStorage();
        $this->assertInstanceOf('\ArrayAccess', $storage);
        // test it lazily sets up the storage.
        $validator->isValid(200);
        $this->assertNotEquals(0, count($storage));
        $storage = new ArrayObject(array());
        $validator = new Validator($storage);
        $this->assertSame($storage, $validator->getStorage());
    }
}
