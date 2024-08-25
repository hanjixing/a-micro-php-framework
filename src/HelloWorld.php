<?php

declare(strict_types=1);

namespace ExampleApp;

use Psr\HTTP\Message\ResponseInterface;

class HelloWorld
{
    private $foo;
    private $response;

    public function __construct(string $foo, ResponseInterface $response)
    {
        $this->foo = $foo;
        $this->response = $response;
    }

    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write("
        <html>
            <head>
            </head>
            <body>
                Hello World, Hi {$this->foo}
            </body>
        </html>
        ");
        return $response;
    }
}