<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Persistence;

use App\EmailSender\Domain\Email;
use App\EmailSender\Domain\EmailDto;
use App\EmailSender\Domain\EmailId;
use App\EmailSender\Domain\EmailRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineEmailRepository implements EmailRepository
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    public function save(Email $email): void
    {
        $this->em->persist($email);
        $this->em->flush();
    }

    public function findById(EmailId $emailId): EmailDto|null
    {
        /** @var Email $email */
        $email = $this->em->getRepository(Email::class)->find($emailId);

        if ($email === null) {
            return null;
        }

        return new EmailDto(
            id: $email->id()->toInteger(),
            sender: $email->sender()->toString(),
            addressee: $email->addressee()->toString(),
            message: $email->message()->toString(),
            status: $email->status()->toString(),
        );
    }

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        $emails = $this->em->getRepository(Email::class)->findAll();

        $emailsDto = [];

        foreach ($emails as $email) {
            $emailsDto[] = new EmailDto(
                id: $email->id()->toInteger(),
                sender: $email->sender()->toString(),
                addressee: $email->addressee()->toString(),
                message: $email->message()->toString(),
                status: $email->status()->toString(),
            );
        }

        return $emailsDto;
    }
}
