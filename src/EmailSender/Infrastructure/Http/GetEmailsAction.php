<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Http;

use App\EmailSender\Application\FindAllEmails\FindAllEmails;
use App\EmailSender\Application\FindAllEmails\FindAllEmailsQuery;
use App\EmailSender\Application\FindAllEmails\FindAllEmailsResponse;
use App\Shared\Domain\Bus\Query\QueryBus;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetEmailsAction
{
    public function __construct(
        private readonly GetEmailsResponder $responder,
        private readonly QueryBus $queryBus,
    ) {
    }

    public function __invoke(Request $request) : Response
    {
        try {
            /** @var FindAllEmailsResponse $emailsResponse */
            $emailsResponse = $this->queryBus->ask(new FindAllEmailsQuery());

            $this->responder->loadEmails($emailsResponse->emails());
        } catch (Exception $e) {
            $this->responder->loadError($e->getMessage());
        }

        return $this->responder->response();
    }
}
