<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Host extends Endpoint
{
    public function all(
        ?array $ids = null,
        ?int $offset = null,
        ?int $limit = null
    ): mixed {
        return $this->client->get(
            '/api/hosts',
            array_filter([
                'ids' => $ids,
                'offset' => $offset,
                'limit' => $limit,
            ], fn ($v) => $v !== null)
        );
    }

    public function get(
        int|string $id
    ): mixed {
        return $this->client->get(
            "/api/host/{$id}"
        );
    }

    public function create(
        array $data
    ): mixed {
        return $this->client->post(
            '/api/host',
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function update(
        int|string $id,
        array $data
    ): mixed {
        return $this->client->put(
            "/api/host/{$id}",
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function bulkUpdate(
        array $data
    ): mixed {
        return $this->client->put(
            '/api/hosts',
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function delete(
        int|string $id
    ): mixed {
        return $this->client->delete(
            "/api/host/{$id}"
        );
    }

    public function bulkDelete(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/hosts/bulk/delete',
            [
                'ids' => $ids,
            ]
        );
    }

    public function bulkDisable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/hosts/bulk/disable',
            [
                'ids' => $ids,
            ]
        );
    }

    public function bulkEnable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/hosts/bulk/enable',
            [
                'ids' => $ids,
            ]
        );
    }
}