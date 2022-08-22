<?php

declare(strict_types=1);

namespace App\EmailSender\Domain;

use DomainException;

class EmailId
{
    public function __construct(private readonly int|null $id)
    {
    }

    public static function placeholder() : self
    {
        return new self(null);
    }

    public static function fromInt(int $value) : EmailId
    {
        return new self($value);
    }

    public function toInteger() : int
    {
        if ($this->id === null) {
            throw new DomainException();
        }

        return $this->id;
    }

    public function isPlaceholder() : bool
    {
        return $this->id === null;
    }

    public function __toString() : string
    {
        return strval($this->id);
    }
}
