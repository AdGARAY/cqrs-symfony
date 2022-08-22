<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Http;

use App\EmailSender\Domain\EmailDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetEmailResponder
{
    /** @var string[] */
    private array $errors = [];

    private Response $response;

    public function loadError(string $error) : void
    {
        $this->errors[] = $error;
    }

    public function loadEmail(EmailDto $email) : void
    {
        $this->response = new JsonResponse(
            [
                'id' => $email->id,
                'sender' => $email->sender,
                'addressee' => $email->addressee,
                'message' => $email->message,
                'status' => $email->status,
            ],
            Response::HTTP_OK,
        );
    }

    public function response() : Response
    {
        if (! empty($this->errors)) {
            return new JsonResponse(
                $this->errors,
                Response::HTTP_BAD_REQUEST,
            );
        }

        return $this->response;
    }
}
