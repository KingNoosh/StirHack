<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LogAction
{
    private $view;
    private $logger;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function dispatch(Request $request, Response $response, $args)
    {
        $this->logger->info("Log api action dispatched");

        $arrData = [
            [
                "id"        => 1,
                "timestamp" => 1455355840,
                "data" => [
                    [
                        "id"    => "ApiName1",
                        "alive" => true,
                        "code"  => 200
                    ],
                    [
                        "id"    => "ApiName2",
                        "alive" => true,
                        "code"  => 200
                    ]
                ]
            ],
            [
                "id"        => 2,
                "timestamp" => 1455365840,
                "data" => [
                    [
                        "id"    => "ApiName1",
                        "alive" => false,
                        "code"  => 404
                    ],
                    [
                        "id"    => "ApiName2",
                        "alive" => false,
                        "code"  => 500
                    ]
                ]
            ],
            [
                "id"        => 3,
                "timestamp" => 1455375840,
                "data" => [
                    [
                        "id"    => "ApiName1",
                        "alive" => true,
                        "code"  => 200
                    ],
                    [
                        "id"    => "ApiName2",
                        "alive" => false,
                        "code"  => 500
                    ]
                ]
            ]
        ];

        $response->withHeader('Content-Type', 'application/json');
        $response->write(json_encode($arrData));
        return $response;
    }
}
