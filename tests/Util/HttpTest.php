<?php

use PHPieces\Framework\Util\Http;
use PHPieces\Framework\Util\Process;

class HttpTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        $dir = __DIR__.'/../data';

        $this->process = new Process("php -S localhost:9000 -t {$dir}");

        // it seems to take the php server a moment to start up. without the 1 second pause this tests fail
        sleep(1);
    }

    public function tearDown()
    {
        $this->process->stop();
    }

    /**
     * @test
     */
    public function it_gets_content_over_http()
    {
        $http = new Http();

        $html = $http->get('http://localhost:9000/http_test.html');

        $pos = strpos($html, 'Hello World!') !== false;

        $this->assertTrue($pos);
    }
}
