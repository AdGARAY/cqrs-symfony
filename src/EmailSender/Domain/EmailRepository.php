<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

interface EmailRepository
{
    public function save(Email $email) : void;

    public function findById(EmailId $emailId) : EmailDto|null;

    /**
     * @return EmailDto[]
     */
    public function findAll() : array;
}
