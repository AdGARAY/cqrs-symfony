<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Http;

use App\EmailSender\Domain\EmailDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetEmailsResponder
{
    /** @var string[] */
    private array $errors = [];

    private Response $response;

    /**
     * @param EmailDto[] $emails
     */
    public function loadEmails(array $emails) : void
    {
        $this->response = new JsonResponse(
                array_map(
                    static fn (EmailDto $email) => [
                        'id' => $email->id,
                        'sender' => $email->sender,
                        'addressee' => $email->addressee,
                        'message' => $email->message,
                        'status' => $email->status,
                    ],
                    $emails
                ),
            Response::HTTP_OK,
        );
    }

    public function loadError(string $error) : void
    {
        $this->errors[] = $error;
    }

    public function response() : Response
    {
        if (! empty($this->errors)) {
            return new Response(
                json_encode($this->errors),
                Response::HTTP_BAD_REQUEST,
            );
        }

        return $this->response;
    }
}
