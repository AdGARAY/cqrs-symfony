<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

class EmailDto
{
    public function __construct(
        public readonly int $id,
        public readonly string $sender,
        public readonly string $addressee,
        public readonly string $message,
        public readonly string $status,
    ) {
    }
}
