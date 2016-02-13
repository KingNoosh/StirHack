<?php
namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class StatusAction
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
        $this->logger->info("Status api action dispatched");

        $arrData = [
            [
                "id"    => "ApiName1",
                "alive" => true
            ],
            [
                "id"    => "ApiName2",
                "alive" => false
            ]
        ];

        $response->withHeader('Content-Type', 'application/json');
        $response->write(json_encode($arrData));
        return $response;
    }
}
