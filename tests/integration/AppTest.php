<?php

use PHPieces\Framework\App;
use PHPieces\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AppTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets()
    {
        $config = [
            'template_dir' => __DIR__.'/../src/templates'
        ];

        $app = new App($config);

        $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
            $response->getBody()->write('<h1>Hello, World!</h1>');

            return $response;
        });

        $app->post('/foo', function (ServerRequestInterface $request, ResponseInterface $response) {
            $response->getBody()->write('<h1>Foo Bar</h1>');

            return $response;
        });

        $client = $this->getClient($app);

        $crawler = $client->request('GET', '/');

        $this->assertEquals('Hello, World!', $crawler->filter('h1')->text());
    }

    /**
     * @test
     */

    public function it_posts()
    {
        $config = [
            'template_dir' => __DIR__.'/../src/templates'
        ];

        $app = new App($config);

        $app->post('/foo', function (ServerRequestInterface $request, ResponseInterface $response) {
            $bar = $request->getParsedBody()['foo'];
            $response->getBody()->write("<h1>Foo {$bar}</h1>");

            return $response;
        });

        $client = $this->getClient($app);

        $crawler = $client->request('POST', '/foo', ['foo' => 'Bar']);
//
        $this->assertEquals('Foo Bar', $crawler->filter('h1')->text());
    }
}
