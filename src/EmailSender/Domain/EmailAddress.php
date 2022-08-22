<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

class EmailAddress
{
    public function __construct(
        private readonly string $email,
    ) {
    }

    public function toString() : string
    {
        return $this->email;
    }
}
