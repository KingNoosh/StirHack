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

        $this->logger->info("Status api action dispatched");
        $status = \App\Model\LogQuery::create()
            ->orderByTimestamp('desc')
            ->limit(4320)
            ->find()
            ->toArray();

        foreach ($status as $key => $value) {
            $status[$key]['Data'] = json_decode($status[$key]['Data']);
        }

        $response->withHeader('Content-Type', 'application/json');
        $response->write(json_encode($status));
        return $response;
    }
}
