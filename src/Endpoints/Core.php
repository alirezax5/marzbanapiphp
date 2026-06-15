<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Core extends Endpoint
{
    public function all(): mixed
    {
        return $this->client->get(
            '/api/cores'
        );
    }

    public function get(
        int|string $id
    ): mixed
    {
        return $this->client->get(
            "/api/core/{$id}"
        );
    }

    public function create(
        array $data
    ): mixed
    {
        return $this->client->post(
            '/api/core',
            array_filter(
                $data,
                fn($v) => $v !== null
            )
        );
    }

    public function restart(
        int|string $id
    ): mixed
    {
        return $this->client->post(
            "/api/core/{$id}/restart"
        );
    }

    public function config(): mixed
    {
        return $this->client->get(
            '/api/core/config'
        );
    }

    public function update(
        int|string $id,
        array      $data,
        bool       $restartNodes = true
    ): mixed
    {
        return $this->client->put(
            "/api/core/{$id}",
            array_filter(
                $data,
                fn($v) => $v !== null
            ),
            [
                'restart_nodes' => $restartNodes,
            ]
        );
    }

    public function delete(
        int|string $id
    ): mixed
    {
        return $this->client->delete(
            "/api/core/{$id}"
        );
    }
}