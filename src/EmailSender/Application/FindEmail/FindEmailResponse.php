<?php

declare(strict_types=1);

namespace App\EmailSender\Application\FindEmail;

use App\EmailSender\Domain\EmailDto;
use App\Shared\Domain\Bus\Query\Response;

class FindEmailResponse implements Response
{
    public function __construct(private readonly EmailDto $email)
    {
    }

    public function email() : EmailDto
    {
        return $this->email;
    }
}
