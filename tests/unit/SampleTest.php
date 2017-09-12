<?php
ini_set('xdebug.show_exception_trace', 0);

class SampleTest extends \PHPUnit_Framework_TestCase
// class SampleTest extends \PHPUnit\Framework\TestCase for PHPUnit 6
{

    /**
     * @test
     */
    public function TrueAssertstoTrue() {

        // $this->markTestIncomplete('Just for skeleton');
        $this->assertFalse(false);
    }
}