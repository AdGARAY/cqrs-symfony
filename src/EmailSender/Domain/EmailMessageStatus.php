<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

enum EmailMessageStatus : string
{
    case PENDING = 'pending';
    case SENT    = 'sent';

    public function toString() : string
    {
        return $this->value;
    }
}
