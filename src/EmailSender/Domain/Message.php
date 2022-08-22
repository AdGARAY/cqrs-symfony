<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

class Message
{
    public function __construct(
        private readonly string $message,
    ) {
    }

    public function toString() : string
    {
        return $this->message;
    }
}
