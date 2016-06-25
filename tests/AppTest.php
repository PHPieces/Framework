<?php

use League\Plates\Engine;
use PHPieces\Framework\App;

class AppTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {

    }

    /**
     * @test
     */
    public function it_loads_dependencies()
    {
        $app = new App();

        $app->bootstrap();

        $this->assertInstanceOf(Engine::class, $app->container->get(Engine::class));
    }
}
