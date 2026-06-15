<?php

namespace alirezax5\MarzbanApi\Endpoints;

class UserTemplate extends Endpoint
{
    public function all(
        ?array $ids = null,
        int $offset = 0,
        int $limit = 10
    ): mixed {
        return $this->client->get(
            '/api/user_template',
            array_filter(compact('offset', 'limit', 'ids'), fn ($v) => $v !== null)
        );
    }

    public function simple(
        ?array $ids = null,
        int $offset = 0,
        int $limit = 10,
        ?string $search = null,
        bool $all = false
    ): mixed {
        return $this->client->get(
            '/api/user_template/simple',
            array_filter([
                'ids' => $ids,
                'offset' => $offset,
                'limit' => $limit,
                'search' => $search,
                'all' => $all,
            ], fn ($v) => $v !== null)
        );
    }

    public function create(
        string $name,
        int $data_limit = 0,
        int $expire_duration = 0,
        ?array $group_ids = null
    ): mixed {
        return $this->client->post(
            '/api/user_template',
            array_filter(compact(
                'name',
                'data_limit',
                'expire_duration',
                'group_ids'
            ), fn ($v) => $v !== null)
        );
    }

    public function get(
        int|string $id
    ): mixed {
        return $this->client->get(
            "/api/user_template/{$id}"
        );
    }

    public function update(
        int|string $id,
        array $data
    ): mixed {
        return $this->client->put(
            "/api/user_template/{$id}",
            array_filter($data, fn ($v) => $v !== null)
        );
    }

    public function delete(
        int|string $id
    ): mixed {
        return $this->client->delete(
            "/api/user_template/{$id}"
        );
    }

    public function bulkDelete(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/user_templates/bulk/delete',
            ['ids' => $ids]
        );
    }

    public function bulkDisable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/user_templates/bulk/disable',
            ['ids' => $ids]
        );
    }

    public function bulkEnable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/user_templates/bulk/enable',
            ['ids' => $ids]
        );
    }
}