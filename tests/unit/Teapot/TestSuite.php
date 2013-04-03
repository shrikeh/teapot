<?php
namespace Tests\Teapot;

use PHPUnit_Framework_TestSuite as TestSuite;
use PHPUnit_Framework_TestResult as TestResult;

class TestSuite extends TestSuite
{
    /**
     * Runs the tests and collects their result in a TestResult.
     *
     * @param PHPUnit_Framework_TestResult $result A test result.
     * @param mixed                        $filter The filter passed to each test.
     *
     * @return \PHPUnit_Framework_TestResult
     */
    public function run(TestResult $result = null, $filter = false)
    {
        $result = parent::run($result, $filter);

        return $result;
    }//end run()
}
