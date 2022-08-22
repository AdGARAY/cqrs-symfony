<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Orm;

use App\EmailSender\Domain\EmailId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

class EmailIdType extends IntegerType
{
    public function getName() : string
    {
        return self::class;
    }

    /**
     * @param int $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) : EmailId
    {
        return EmailId::fromInt($value);
    }

    /**
     * @param EmailId $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform) : int|null
    {
        return $value->isPlaceholder() ? null : $value->toInteger();
    }
}
