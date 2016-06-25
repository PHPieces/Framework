<?php

namespace PHPieces\Framework;

use \League\Plates\Engine;
use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

class App
{
    public $container;

    public $route;

    public function __construct()
    {
        $this->bootstrap();
    }

    public function bootstrap()
    {
        $this->loadContainer();
    }
    
    public function run()
    {
        $this->route->dispatch($this->container->get('request'), $this->container->get('response'));
    }

    public function get($route, $handler)
    {
        $this->route->map('GET', $route, $handler);
    }

    public function post($route, $handler)
    {
        $this->route->map('POST', $route, $handler);
    }

    private function loadContainer()
    {
        $this->container = new \League\Container\Container;

        $this->container->delegate(
            new \League\Container\ReflectionContainer
        );

        $this->container->share('response', Response::class);

        $this->container->share(
            'request', function () {
                return ServerRequestFactory::fromGlobals(
                    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
                );
            }
        );

        $this->container->share('emitter', SapiEmitter::class);

        $this->route = new RouteCollection($this->container);

        $this->container->share(Engine::class, Engine::class)->withArgument(__DIR__ . '/templates');
    }
}