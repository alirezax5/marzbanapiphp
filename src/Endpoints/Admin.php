<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Admin extends Endpoint
{
    public function adminToken($username, $password)
    {
        return $this->client->postForm('/api/admin/token', ['username' => $username, 'password' => $password]);
    }

    public function me(): mixed
    {
        return $this->client->get('/api/admin');
    }

    public function all(
        ?string $username = null,
        int     $offset = 0,
        int     $limit = 10
    ): mixed
    {
        return $this->client->get(
            '/api/admins',
            array_filter(
                compact('username', 'offset', 'limit'),
                fn($v) => $v !== null
            )
        );
    }

    public function simple(
        ?string $username = null,
        ?string $search = null,
        int     $offset = 0,
        int     $limit = 10,
        ?string $sort = null,
        bool    $all = false
    ): mixed
    {
        return $this->client->get(
            '/api/admins/simple',
            array_filter(
                compact(
                    'username',
                    'search',
                    'offset',
                    'limit',
                    'sort',
                    'all'
                ),
                fn($v) => $v !== null
            )
        );
    }

    public function create(array $data): mixed
    {
        return $this->client->post(
            '/api/admin',
            array_filter(
                $data,
                fn($v) => $v !== null
            )
        );
    }

    public function update(
        string $username,
        array  $data
    ): mixed
    {
        return $this->client->put(
            "/api/admin/{$username}",
            array_filter(
                $data,
                fn($v) => $v !== null
            )
        );
    }

    public function updateById(
        int|string $id,
        array      $data
    ): mixed
    {
        return $this->client->put(
            "/api/admin/by-id/{$id}",
            array_filter(
                $data,
                fn($v) => $v !== null
            )
        );
    }

    public function delete(
        string $username
    ): mixed
    {
        return $this->client->delete(
            "/api/admin/{$username}"
        );
    }

    public function deleteById(
        int|string $id
    ): mixed
    {
        return $this->client->delete(
            "/api/admin/by-id/{$id}"
        );
    }

    public function miniAppToken(): mixed
    {
        return $this->client->post(
            '/api/admin/miniapp/token'
        );
    }

    public function disableUsers(
        string $username
    ): mixed
    {
        return $this->client->post(
            "/api/admin/{$username}/users/disable"
        );
    }

    public function disableUsersById(
        int|string $id
    ): mixed
    {
        return $this->client->post(
            "/api/admin/by-id/{$id}/users/disable"
        );
    }

    public function activateUsers(
        string $username
    ): mixed
    {
        return $this->client->post(
            "/api/admin/{$username}/users/activate"
        );
    }

    public function activateUsersById(
        int|string $id
    ): mixed
    {
        return $this->client->post(
            "/api/admin/by-id/{$id}/users/activate"
        );
    }

    public function usage(
        string $username,
        string $period = 'day',
        ?int   $nodeId = null,
        bool   $groupByNode = false,
        ?int   $start = null,
        ?int   $end = null
    ): mixed
    {
        return $this->client->post(
            "/api/admin/{$username}/usage",
            array_filter([
                'period' => $period,
                'node_id' => $nodeId,
                'group_by_node' => $groupByNode,
                'start' => $start,
                'end' => $end,
            ], fn($v) => $v !== null)
        );
    }

    public function usageById(
        int|string $id,
        string     $period = 'day',
        ?int       $nodeId = null,
        bool       $groupByNode = false,
        ?int       $start = null,
        ?int       $end = null
    ): mixed
    {
        return $this->client->post(
            "/api/admin/by-id/{$id}/usage",
            array_filter([
                'period' => $period,
                'node_id' => $nodeId,
                'group_by_node' => $groupByNode,
                'start' => $start,
                'end' => $end,
            ], fn($v) => $v !== null)
        );
    }

    public function reset(
        string $username
    ): mixed
    {
        return $this->client->post(
            "/api/admin/{$username}/reset"
        );
    }

    public function resetById(
        int|string $id
    ): mixed
    {
        return $this->client->post(
            "/api/admin/by-id/{$id}/reset"
        );
    }

    public function removeUsers(
        string $username
    ): mixed
    {
        return $this->client->delete(
            "/api/admin/{$username}/users"
        );
    }

    public function removeUsersById(
        int|string $id
    ): mixed
    {
        return $this->client->delete(
            "/api/admin/by-id/{$id}/users"
        );
    }

    public function bulkDelete(
        array $usernames
    ): mixed
    {
        return $this->client->post(
            '/api/admin/bulk/delete',
            ['usernames' => $usernames]
        );
    }

    public function bulkReset(
        array $usernames
    ): mixed
    {
        return $this->client->post(
            '/api/admin/bulk/reset',
            ['usernames' => $usernames]
        );
    }

    public function bulkDisable(
        array $usernames
    ): mixed
    {
        return $this->client->post(
            '/api/admin/bulk/disable',
            ['usernames' => $usernames]
        );
    }

    public function bulkEnable(
        array $usernames
    ): mixed
    {
        return $this->client->post(
            '/api/admin/bulk/enable',
            ['usernames' => $usernames]
        );
    }

    public function bulkDisableUsers(
        array $usernames
    ): mixed
    {
        return $this->client->post(
            '/api/admin/bulk/users/disable',
            ['usernames' => $usernames]
        );
    }

    public function bulkEnableUsers(
        array $usernames
    ): mixed
    {
        return $this->client->post(
            '/api/admin/bulk/users/enable',
            ['usernames' => $usernames]
        );
    }

    public function bulkDeleteUsers(
        array $usernames
    ): mixed
    {
        return $this->client->delete(
            '/api/admin/bulk/users',
            ['usernames' => $usernames]
        );
    }
}