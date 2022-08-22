<?php

declare(strict_types=1);

namespace App\EmailSender\Application\FindEmail;

use App\Shared\Domain\Bus\Query\Query;

class FindEmailQuery implements Query
{
    public function __construct(private readonly int $id)
    {
    }

    public function id() : int
    {
        return $this->id;
    }
}
