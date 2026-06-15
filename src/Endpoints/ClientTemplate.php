<?php

namespace alirezax5\MarzbanApi\Endpoints;

class ClientTemplate extends Endpoint
{
    public function all(
        ?array  $ids = null,
        ?string $templateType = null,
        ?int    $offset = null,
        ?int    $limit = null
    ): mixed
    {
        return $this->client->get(
            '/api/client_template',
            array_filter([
                'ids' => $ids,
                'template_type' => $templateType,
                'offset' => $offset,
                'limit' => $limit,
            ], fn($v) => $v !== null)
        );
    }

    public function simple(
        ?array  $ids = null,
        int     $offset = 0,
        int     $limit = 10,
        ?string $search = null,
        bool    $all = false
    ): mixed
    {
        return $this->client->get(
            '/api/client_template/simple',
            array_filter([
                'ids' => $ids,
                'offset' => $offset,
                'limit' => $limit,
                'search' => $search,
                'all' => $all,
            ], fn($v) => $v !== null)
        );
    }

    public function get(
        int|string $id
    ): mixed
    {
        return $this->client->get(
            "/api/client_template/{$id}"
        );
    }

    public function create(
        array $data
    ): mixed
    {
        return $this->client->post(
            '/api/client_template',
            array_filter(
                $data,
                fn($v) => $v !== null
            )
        );
    }

    public function update(
        int|string $id,
        array      $data
    ): mixed
    {
        return $this->client->put(
            "/api/client_template/{$id}",
            array_filter(
                $data,
                fn($v) => $v !== null
            )
        );
    }

    public function delete(
        int|string $id
    ): mixed
    {
        return $this->client->delete(
            "/api/client_template/{$id}"
        );
    }

    public function bulkDelete(
        array $ids
    ): mixed
    {
        return $this->client->post(
            '/api/client_template/bulk/delete',
            [
                'ids' => $ids,
            ]
        );
    }
}