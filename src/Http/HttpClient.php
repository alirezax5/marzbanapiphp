<?php

namespace alirezax5\MarzbanApi\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
    private ?string $token = null;

    private int $httpCode = 0;

    public function __construct(
        private readonly Client $client,
        private string          $subPath = '/sub/'

    )
    {
    }

    public function getSubPath(): string
    {
        return $this->subPath;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function get(
        string $path,
        array  $query = []
    ): mixed
    {
        return $this->request(
            'GET',
            $path,
            [],
            'json',
            $query
        );
    }

    public function post(
        string $path,
        array  $body = [],
        array  $query = []
    ): mixed
    {
        return $this->request(
            'POST',
            $path,
            $body,
            'json',
            $query
        );
    }

    public function put(
        string $path,
        array  $body = [],
        array  $query = []
    ): mixed
    {
        return $this->request(
            'PUT',
            $path,
            $body,
            'json',
            $query
        );
    }

    public function patch(
        string $path,
        array  $body = [],
        array  $query = []
    ): mixed
    {
        return $this->request(
            'PATCH',
            $path,
            $body,
            'json',
            $query
        );
    }

    public function delete(
        string $path,
        array  $body = [],
        array  $query = []
    ): mixed
    {
        return $this->request(
            'DELETE',
            $path,
            $body,
            'json',
            $query
        );
    }

    public function postForm(
        string $path,
        array  $body = [],
        array  $query = []
    ): mixed
    {
        return $this->request(
            'POST',
            $path,
            $body,
            'form',
            $query
        );
    }

    private function request(
        string $method,
        string $path,
        array  $data = [],
        string $type = 'json',
        array  $query = []
    ): mixed
    {
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'Marzban-PHP/1.0',
            ],
            'timeout' => 30,
        ];

        if ($this->token !== null) {
            $options['headers']['Authorization'] =
                'Bearer ' . $this->token;
        }

        $query = array_filter(
            $query,
            fn($v) => $v !== null
        );

        if ($query !== []) {
            $options['query'] = $query;
        }

        $data = array_filter(
            $data,
            fn($v) => $v !== null
        );

        if ($method !== 'GET' && $data !== []) {
            switch ($type) {
                case 'form':
                    $options['form_params'] = $data;
                    $options['headers']['Content-Type'] =
                        'application/x-www-form-urlencoded';
                    break;

                case 'json':
                default:
                    $options['json'] = $data;
                    $options['headers']['Content-Type'] =
                        'application/json';
                    break;
            }
        }

        try {
            $response = $this->client->request(
                $method,
                $path,
                $options
            );

            $this->httpCode =
                $response->getStatusCode();

            $body =
                $response->getBody()->getContents();

            $decoded =
                json_decode($body);

            return json_last_error() === JSON_ERROR_NONE
                ? $decoded
                : $body;
        } catch (RequestException $e) {
            $this->httpCode =
                $e->hasResponse()
                    ? $e->getResponse()->getStatusCode()
                    : 0;

            throw $e;
        }
    }
}