<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Orm;

use App\EmailSender\Domain\EmailMessageStatus;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class EmailMessageStatusType extends StringType
{
    public function getName() : string
    {
        return self::class;
    }

    /**
     * @param string $value
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) : EmailMessageStatus
    {
        return EmailMessageStatus::from(strval($value));
    }

    /**
     * @param EmailMessageStatus $value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform) : string
    {
        return $value->toString();
    }
}
