<?php
namespace Tests;

use \PHPUnit_TextUI_TestRunner as TestRunner;
use \Tests\Teapot\TestSuite;

require_once __DIR__ . '/../../vendor/autoload.php';

class AllTests
{
    public static function main()
    {
        TestRunner::run(self::suite());
    }

    /**
     * Add all PHP_CodeSniffer test suites into a single test suite.
     *
     * @return \PHPUnit_Framework_TestSuite
     */
    public static function suite()
    {
        $suite = new TestSuite('Teapot');

        return $suite;

    }//end suite()
}
