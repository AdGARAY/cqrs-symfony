<?php

declare(strict_types=1);

namespace App\EmailSender\Application\Create;

use App\Shared\Domain\Bus\Command\Command;

class CreateEmailCommand implements Command
{
    public function __construct(
        private readonly string $sender,
        private readonly string $addressee,
        private readonly string $message,
    ) {
    }

    public function sender(): string
    {
        return $this->sender;
    }

    public function addressee(): string
    {
        return $this->addressee;
    }

    public function message(): string
    {
        return $this->message;
    }
}
