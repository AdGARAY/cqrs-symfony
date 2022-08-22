<?php

declare(strict_types=1);

namespace App\EmailSender\Application\FindAllEmails;

use App\EmailSender\Domain\Email;
use App\EmailSender\Domain\EmailRepository;
use App\Shared\Domain\Bus\Query\QueryHandler;

class FindAllEmails implements QueryHandler
{
    public function __construct(private EmailRepository $repository)
    {
    }

    public function __invoke(FindAllEmailsQuery $query) : FindAllEmailsResponse
    {
        return new FindAllEmailsResponse(
            emails: $this->repository->findAll(),
        );
    }
}
