<?php

declare(strict_types=1);

namespace App\EmailSender\Application\FindAllEmails;

use App\EmailSender\Domain\EmailDto;
use App\Shared\Domain\Bus\Query\Response;

class FindAllEmailsResponse implements Response
{
    /**
     * @param EmailDto[] $emails
     */
    public function __construct(private array $emails)
    {
    }

    /**
     * @return EmailDto[]
     */
    public function emails() : array
    {
        return $this->emails;
    }
}
