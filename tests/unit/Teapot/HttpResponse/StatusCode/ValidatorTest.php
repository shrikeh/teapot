<?php
namespace Tests\Teapot\HttpResponse\StatusCode;

use \PHPUnit_Framework_TestCase as TestCase;
use \Teapot\HttpResponse\StatusCode\Validator;

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
     * @covers \Teapot\HttpResponse\StatusCode\Validator::isValid()
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
     * @covers \Teapot\HttpResponse\StatusCode\Validator::getStorage()
     */
    public function testGetStorage()
    {
        $validator = new Validator();
        $storage = $validator->getStorage();
        $this->assertInstanceOf('\ArrayAccess', $storage);
        $this->assertEquals(0, count($storage));

        // test it lazily sets up the storage.
        $validator->isValid(200);
        $this->assertNotEquals(0, count($storage));

    }
}
