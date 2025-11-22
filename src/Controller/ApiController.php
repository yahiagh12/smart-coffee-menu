<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiController
{
    /**
     * Base JSON response with CORS enabled.
     */
    protected function jsonResponse(
        mixed $data,
        int $status = 200,
        array $headers = []
    ): JsonResponse {
        $response = new JsonResponse($data, $status);

        // CORS headers
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        // Additional headers
        foreach ($headers as $key => $value) {
            $response->headers->set($key, $value);
        }

        return $response;
    }

    /**
     * 200 OK helper.
     */
    protected function ok(mixed $data): JsonResponse
    {
        return $this->jsonResponse($data, Response::HTTP_OK);
    }

    /**
     * 201 Created helper.
     */
    protected function created(mixed $data): JsonResponse
    {
        return $this->jsonResponse($data, Response::HTTP_CREATED);
    }

    /**
     * 400 Error helper.
     */
    protected function error(string $message, int $status = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return $this->jsonResponse(['error' => $message], $status);
    }

    /**
     * 404 Not Found helper.
     */
    protected function notFound(string $message = 'Not found'): JsonResponse
    {
        return $this->error($message, Response::HTTP_NOT_FOUND);
    }
}
