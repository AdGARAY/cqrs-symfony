<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

class Email
{
    public function __construct(
        private EmailId $id,
        private EmailAddress $sender,
        private EmailAddress $addressee,
        private Message $message,
        private EmailMessageStatus $status,
    ) {
    }

    public static function createNewEmail(
        EmailAddress $sender,
        EmailAddress $addressee,
        Message $message,
    ) : Email {
        return new Email(
            id: EmailId::placeholder(),
            sender: $sender,
            addressee: $addressee,
            message: $message,
            status: EmailMessageStatus::PENDING,
        );
    }

    public function id() : EmailId
    {
        return $this->id;
    }

    public function sender(): EmailAddress
    {
        return $this->sender;
    }

    public function addressee(): EmailAddress
    {
        return $this->addressee;
    }

    public function message(): Message
    {
        return $this->message;
    }

    public function status() : EmailMessageStatus
    {
        return $this->status;
    }
}
