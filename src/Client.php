<?php

namespace PHPieces\Framework;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;
use Zend\Diactoros\Request;
use Zend\Diactoros\ServerRequest;

class Client extends BaseClient
{
    /**
     * @var App
     */
    public $app;

    protected function doRequest($request)
    {
        $psrRequest = new ServerRequest(
            $request->getServer(),
            $request->getFiles(),
            $request->getUri(),
            $request->getMethod(),
            fopen('data://text/plain,' . $request->getContent(),'r'),
            [],
            $request->getCookies(),
            $request->getParameters(),
            $request->getParameters()
        );

        $response = $this->app->getResponse($psrRequest);

        return new Response($response->getBody(), $response->getStatusCode(), $response->getHeaders());
    }
}