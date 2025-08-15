<?php

namespace alirezax5\MarzbanApi\Api;

trait User
{
    public function addUser($username, $expire, $data_limit, $group_ids = [], $proxy_settings = ['vless' => [], 'vmess' => [], 'trojan' => []], $status = 'active', $note = '', $data_limit_reset_strategy = 'no_reset', $on_hold_expire_duration = 0, $on_hold_timeout = '2046-11-03T20:30:00', $next_plan = null)
    {
        return $this->request('/api/user', compact('username', 'expire', 'data_limit', 'group_ids', 'proxy_settings', 'status', 'note', 'data_limit_reset_strategy', 'on_hold_expire_duration', 'on_hold_timeout'), self::POST);
    }

    public function getUser($username)
    {
        return $this->request('/api/user/' . $username, [], 'GET');
    }

    public function editUser($username, $expire = null, $data_limit = null, $group_ids = null, $proxy_settings = null, $status = 'active', $note = null, $data_limit_reset_strategy = null, $on_hold_expire_duration = null, $on_hold_timeout = null, $next_plan = null)
    {
        return $this->request('/api/user/' . $username, compact('expire', 'data_limit', 'group_ids', 'proxy_settings', 'status', 'note', 'data_limit_reset_strategy', 'on_hold_expire_duration', 'on_hold_timeout'), self::PUT);
    }

    public function removeUser($username)
    {
        return $this->request('/api/user/' . $username, [], self::DELETE);
    }

    public function resetUser($username)
    {
        return $this->request('/api/user/' . $username . '/reset', [], self::POST);
    }

    public function resetUsers()
    {
        return $this->request('/api/users/reset', [], self::POST);
    }

    public function revokeSubUser($username)
    {
        return $this->request('/api/user/' . $username . '/revoke_sub', [], self::POST);
    }

    public function userSetOwner($username, $admin_username)
    {
        return $this->request('/api/user/' . $username . '/set_owner', [], self::POST);
    }

    public function getUsers($offset = 0, $limit = 0, $username = null, $status = null, $sort = null)
    {
        return $this->request('/api/users', compact('offset', 'limit', 'username', 'status', 'sort'), self::GET);
    }

    public function usageUser($username, $start = null, $end = null)
    {
        return $this->request('/api/user/' . $username . '/usage', compact('start', 'end'), self::GET);
    }

    public function removeExpired($passed_time = null)
    {
        return $this->request('/api/users/expired', compact('passed_time'), self::DELETE);
    }

    public function addUserFromTemplate($user_template_id, $username, $note = null)
    {
        return $this->request('/api/user/from_template', compact('user_template_id', 'username', 'note'), self::POST);
    }

    public function editUserFromTemplate($user_template_id, $username, $note = null)
    {
        return $this->request('/api/users/bulk/expire' . $username, compact('user_template_id', 'note'), self::PUT);
    }

    public function usersBulkExpire($amount, $group_ids = null, $user_ids = null, $admins = null, $status = null)
    {
        return $this->request('/api/users/bulk/expire', compact('group_ids', 'amount', 'user_ids', 'admins', 'status'), self::PUT);
    }

    public function usersBulkDataLimit($amount, $group_ids = null, $user_ids = null, $admins = null, $status = null)
    {
        return $this->request('/api/users/bulk/data_limit', compact('group_ids', 'amount', 'user_ids', 'admins', 'status'), self::PUT);
    }

    public function usersBulkProxySettings($flow, $group_ids = null, $user_ids = null, $admins = null, $method = null)
    {
        return $this->request('/api/users/bulk/proxy_settings', compact('group_ids', 'flow', 'user_ids', 'admins', 'method'), self::PUT);
    }
}