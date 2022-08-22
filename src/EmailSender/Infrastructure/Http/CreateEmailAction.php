<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Http;

use App\EmailSender\Application\Create\CreateEmailCommand;
use App\Shared\Domain\Bus\Command\CommandBus;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateEmailAction
{
    public function __construct(
        private readonly CreateEmailResponder $responder,
        private readonly CommandBus $commandBus,
    ) {
    }

    public function __invoke(Request $request) : Response
    {
        try {
            $this->commandBus->dispatch(
                new CreateEmailCommand(
                    sender: $request->request->get('sender'),
                    addressee: $request->request->get('addressee'),
                    message: $request->request->get('message'),
                ),
            );
        } catch (Exception $e) {
            $this->responder->loadError($e->getMessage());
        }

        return $this->responder->response();
    }
}
