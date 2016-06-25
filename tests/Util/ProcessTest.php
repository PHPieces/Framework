<?php

use PHPieces\Framework\Util\Process;

class ProcessTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $dir = __DIR__.'/../data';

        $this->process = new Process("php -S localhost:9000 -t {$dir}");
    }

    public function tearDown()
    {
        $this->process->stop();
    }

    /**
     * @test
     */
    public function it_runs_process()
    {
        $this->assertTrue($this->process->status());
    }
}