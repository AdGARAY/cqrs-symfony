<?php

declare(strict_types=1);

namespace App\EmailSender\Infrastructure\Http;

use Symfony\Component\HttpFoundation\Response;

class CreateEmailResponder
{
    /** @var string[] */
    private array $errors = [];

    private Response $response;

    public function __construct()
    {
        $this->response = new Response(
            '',
            Response::HTTP_NO_CONTENT,
        );
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

    public function loadError(string $error) : void
    {
        $this->errors[] = $error;
    }
}
