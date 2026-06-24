<?php

namespace alirezax5\MarzbanApi\Endpoints;

class User extends Endpoint
{
    public function get(string $username): mixed
    {
        return $this->client->get(
            "/api/user/by-username/{$username}"
        );
    }

    public function getById(int|string $id): mixed
    {
        return $this->client->get(
            "/api/user/by-id/{$id}"
        );
    }

    public function all(
        int     $offset = 0,
        int     $limit = 0,
        ?string $username = null,
        ?string $status = null,
        ?string $sort = null,
    ): mixed
    {
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
                fn($v) => $v !== null
            )
        );
    }

    public function simple(
        ?array  $ids = null,
        int     $offset = 0,
        int     $limit = 0,
        ?array  $usernames = null,
        ?string $status = null,
        ?string $sort = null,
    ): mixed
    {
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
                fn($v) => $v !== null
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
        array  $data
    ): mixed
    {
        return $this->client->put(
            "/api/user/{$username}",
            $data
        );
    }

    public function updateById(
        int|string $id,
        array      $data
    ): mixed
    {
        return $this->client->put(
            "/api/user/by-id/{$id}",
            $data
        );
    }

    public function delete(
        string $username
    ): mixed
    {
        return $this->client->delete(
            "/api/user/by-username/{$username}"
        );
    }

    public function deleteById(
        int|string $id
    ): mixed
    {
        return $this->client->delete(
            "/api/user/by-id/{$id}"
        );
    }

    public function resetAll(): mixed
    {
        return $this->client->post(
            "/api/users/reset"
        );
    }

    public function reset(
        string $username
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-username/{$username}/reset"
        );
    }

    public function resetById(
        int|string $id
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-id/{$id}/reset"
        );
    }

    public function revokeSubscription(
        string $username
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-username/{$username}/revoke_sub"
        );
    }

    public function revokeSubscriptionById(
        string $id
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-id/{$id}/revoke_sub"
        );
    }

    public function setOwner(
        string $username,
        string $adminUsername
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-username/{$username}/set_owner",
            [
                'admin_username' => $adminUsername,
            ]
        );
    }

    public function setOwnerById(
        string $id,
        string $adminUsername
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-id/{$id}/set_owner",
            [
                'admin_username' => $adminUsername,
            ]
        );
    }

    public function activeNext(
        string $username
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-username/{$username}/active_next"
        );
    }

    public function activeNextByid(
        string $id
    ): mixed
    {
        return $this->client->post(
            "/api/user/by-id/{$id}/active_next"
        );
    }

    public function getSubscriptionById(
        string $id,
        string $client_type = 'links'
    ): mixed
    {
        return $this->client->get(
            "/api/user/{$id}/subscription/$client_type"
        );
    }

    public function getAgent(
        string $username,
    ): mixed
    {
        return $this->client->get(
            "/api/user/by-username/{$username}/sub_update"
        );
    }

    public function getAgentById(
        string $id,
    ): mixed
    {
        return $this->client->get(
            "/api/user/by-id/{$id}/sub_update"
        );
    }

    public function usage(
        string $username,
        string $period = 'hour',
        ?int   $nodeId = null,
        ?int   $start = null,
        ?int   $end = null
    ): mixed
    {
        return $this->client->get(
            "/api/user/by-username/{$username}/usage",
            array_filter(
                [
                    'period' => $period,
                    'node_id' => $nodeId,
                    'start' => $start,
                    'end' => $end,
                ],
                fn($v) => $v !== null
            )
        );
    }

    public function usageByid(
        string $id,
        string $period = 'hour',
        ?int   $nodeId = null,
        ?int   $start = null,
        ?int   $end = null
    ): mixed
    {
        return $this->client->get(
            "/api/user/by-id/{$id}/usage",
            array_filter(
                [
                    'period' => $period,
                    'node_id' => $nodeId,
                    'start' => $start,
                    'end' => $end,
                ],
                fn($v) => $v !== null
            )
        );
    }

    public function usageUsers(
        string  $period = 'hour',
        ?int    $nodeId = null,
        ?int    $start = null,
        ?int    $end = null,
        ?bool   $group_by_node = null,
        ?string $admin = null
    ): mixed
    {
        return $this->client->get(
            "/api/users/usage",
            array_filter(
                [
                    'period' => $period,
                    'node_id' => $nodeId,
                    'start' => $start,
                    'end' => $end,
                    'group_by_node' => $group_by_node,
                    'admin' => $admin,
                ],
                fn($v) => $v !== null
            )
        );
    }

    public function getExpired(
        string  $target = 'expired',
        ?string $expired_after = null,
        ?string $expired_before = null,
        ?string $admin_username = null,

    ): mixed
    {
        return $this->client->get(
            "/api/users/expired",
            array_filter(
                [
                    'target' => $target,
                    'expired_after' => $expired_after,
                    'expired_before' => $expired_before,
                    'admin_username' => $admin_username,

                ],
                fn($v) => $v !== null
            )
        );
    }

    public function deleteExpired(
        string  $target = 'expired',
        ?string $expired_after = null,
        ?string $expired_before = null,
        ?string $admin_username = null,

    ): mixed
    {
        return $this->client->delete(
            "/api/users/expired",
            array_filter(
                [
                    'target' => $target,
                    'expired_after' => $expired_after,
                    'expired_before' => $expired_before,
                    'admin_username' => $admin_username,

                ],
                fn($v) => $v !== null
            )
        );
    }


    public function bulkDelete(
        array $ids
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/delete',
            compact('ids')
        );
    }

    public function bulkReset(
        array $ids
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/reset',
            compact('ids')
        );
    }

    public function bulkDisable(
        array $ids
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/disable',
            compact('ids')
        );
    }

    public function bulkEnable(
        array $ids
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/enable',
            compact('ids')
        );
    }

    public function bulkRevokeSub(
        array $ids
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/revoke_sub',
            compact('ids')
        );
    }

    public function bulkSetOwner(
        array  $ids,
        string $admin_username
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/set_owner',
            compact('ids', 'admin_username')
        );
    }

    public function createFromTemplate(
        $user_template_id,
        $username,
        $note = null
    ): mixed
    {
        return $this->client->post(
            '/api/user/from_template',
            compact('user_template_id', 'username', 'note')
        );
    }

    public function bulkCreateFromTemplate(
        $user_template_id,
        $username,
        $count = 1,
        $strategy = 'random',
        $start_number = 0,
        $note = null,
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/from_template',
            compact('user_template_id', 'username', 'count', 'strategy', 'start_number', 'note')
        );
    }

    public function bulkApplyTemplate(
        $user_template_id,
        array $ids,
        $note = null,
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/apply_template',
            compact('user_template_id', 'ids', 'note')
        );
    }

    public function modifyFromTemplate(
        $user_template_id,
        $username,
        $note = null,
    ): mixed
    {
        return $this->client->put(
            '/api/user/from_template/by-username/' . $username,
            compact('user_template_id', 'user_template_id', 'note')
        );
    }

    public function modifyFromTemplateById(
        $user_template_id,
        $username,
        $note = null,
    ): mixed
    {
        return $this->client->put(
            '/api/user/from_template/by-id/' . $username,
            compact('user_template_id', 'user_template_id', 'note')
        );
    }

    public function bulkExpire(
        array $array
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/expire',
            $array
        );
    }

    public function bulkDataLimit(
        array $array
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/data_limit',
            $array
        );
    }

    public function bulkProxySettings(
        array $array
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/proxy_settings',
            $array
        );
    }

    public function bulkWireguardReallocatePeerIps(
        array $array
    ): mixed
    {
        return $this->client->post(
            '/api/users/bulk/wireguard/reallocate-peer-ips',
            $array
        );
    }
}