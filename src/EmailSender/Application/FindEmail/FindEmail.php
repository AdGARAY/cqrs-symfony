<?php

declare(strict_types=1);

namespace App\EmailSender\Application\FindEmail;

use App\EmailSender\Domain\Email;
use App\EmailSender\Domain\EmailId;
use App\EmailSender\Domain\EmailRepository;
use App\Shared\Domain\Bus\Query\QueryHandler;
use InvalidArgumentException;

class FindEmail implements QueryHandler
{
    public function __construct(private EmailRepository $repository)
    {
    }

    public function __invoke(FindEmailQuery $query) : FindEmailResponse
    {
        $email = $this->repository->findById(
            EmailId::fromInt(
                $query->id(),
            ),
        );

        if ($email === null) {
            throw new InvalidArgumentException('Email unreachable');
        }

        return new FindEmailResponse(
            email: $email,
        );
    }
}
