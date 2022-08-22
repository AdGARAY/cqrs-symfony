<?php

declare(strict_types=1);

namespace App\EmailSender\Application\Create;

use App\EmailSender\Domain\Email;
use App\EmailSender\Domain\EmailAddress;
use App\EmailSender\Domain\EmailRepository;
use App\EmailSender\Domain\Message;
use App\Shared\Domain\Bus\Command\CommandHandler;

class CreateEmailCommandHandler implements CommandHandler
{
    public function __construct(private EmailRepository $repository)
    {
    }

    public function __invoke(CreateEmailCommand $command) : void
    {
        $email = Email::createNewEmail(
            sender: new EmailAddress($command->sender()),
            addressee: new EmailAddress($command->addressee()),
            message: new Message($command->message()),
        );

        $this->repository->save($email);
    }
}
