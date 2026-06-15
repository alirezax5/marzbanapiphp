<?php

namespace alirezax5\MarzbanApi\Endpoints;

class User extends Endpoint
{
    public function get(string $username): mixed
    {
        return $this->client->get(
            "/api/user/{$username}"
        );
    }

    public function getById(int|string $id): mixed
    {
        return $this->client->get(
            "/api/user/by-id/{$id}"
        );
    }

    public function all(
        int $offset = 0,
        int $limit = 0,
        ?string $username = null,
        ?string $status = null,
        ?string $sort = null,
    ): mixed {
        return $this->client->get(
            '/api/users',
            array_filter(
                compact(
                    'offset',
                    'limit',
                    'username',
                    'status',
                    'sort'
                ),
                fn ($v) => $v !== null
            )
        );
    }

    public function simple(
        ?array $ids = null,
        int $offset = 0,
        int $limit = 0,
        ?array $usernames = null,
        ?string $status = null,
        ?string $sort = null,
    ): mixed {
        return $this->client->get(
            '/api/users/simple',
            array_filter(
                compact(
                    'ids',
                    'offset',
                    'limit',
                    'usernames',
                    'status',
                    'sort'
                ),
                fn ($v) => $v !== null
            )
        );
    }

    public function create(array $data): mixed
    {
        return $this->client->post(
            '/api/user',
            $data
        );
    }

    public function update(
        string $username,
        array $data
    ): mixed {
        return $this->client->put(
            "/api/user/{$username}",
            $data
        );
    }

    public function updateById(
        int|string $id,
        array $data
    ): mixed {
        return $this->client->put(
            "/api/user/by-id/{$id}",
            $data
        );
    }

    public function delete(
        string $username
    ): mixed {
        return $this->client->delete(
            "/api/user/{$username}"
        );
    }

    public function deleteById(
        int|string $id
    ): mixed {
        return $this->client->delete(
            "/api/user/by-id/{$id}"
        );
    }

    public function reset(
        string $username
    ): mixed {
        return $this->client->post(
            "/api/user/{$username}/reset"
        );
    }

    public function resetById(
        int|string $id
    ): mixed {
        return $this->client->post(
            "/api/user/by-id/{$id}/reset"
        );
    }

    public function revokeSubscription(
        string $username
    ): mixed {
        return $this->client->post(
            "/api/user/{$username}/revoke_sub"
        );
    }

    public function setOwner(
        string $username,
        string $adminUsername
    ): mixed {
        return $this->client->post(
            "/api/user/{$username}/set_owner",
            [
                'admin_username' => $adminUsername,
            ]
        );
    }

    public function usage(
        string $username,
        string $period = 'hour',
        ?int $nodeId = null,
        ?int $start = null,
        ?int $end = null
    ): mixed {
        return $this->client->get(
            "/api/user/{$username}/usage",
            array_filter(
                [
                    'period' => $period,
                    'node_id' => $nodeId,
                    'start' => $start,
                    'end' => $end,
                ],
                fn ($v) => $v !== null
            )
        );
    }

    public function bulkDelete(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/users/bulk/delete',
            compact('ids')
        );
    }

    public function bulkReset(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/users/bulk/reset',
            compact('ids')
        );
    }

    public function bulkDisable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/users/bulk/disable',
            compact('ids')
        );
    }

    public function bulkEnable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/users/bulk/enable',
            compact('ids')
        );
    }
}