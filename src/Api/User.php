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

    public function getUserById($id)
    {
        return $this->request('/api/user/by-id/' . $id, [], 'GET');
    }

    public function editUser($username, $expire = null, $data_limit = null, $group_ids = null, $proxy_settings = null, $status = 'active', $note = null, $data_limit_reset_strategy = null, $on_hold_expire_duration = null, $on_hold_timeout = null, $next_plan = null)
    {
        return $this->request('/api/user/' . $username, compact('expire', 'data_limit', 'group_ids', 'proxy_settings', 'status', 'note', 'data_limit_reset_strategy', 'on_hold_expire_duration', 'on_hold_timeout'), self::PUT);
    }

    public function editUserByUsername($username, $expire = null, $data_limit = null, $group_ids = null, $proxy_settings = null, $status = 'active', $note = null, $data_limit_reset_strategy = null, $on_hold_expire_duration = null, $on_hold_timeout = null, $next_plan = null)
    {
        return $this->request('/api/user/by-username/' . $username, compact('expire', 'data_limit', 'group_ids', 'proxy_settings', 'status', 'note', 'data_limit_reset_strategy', 'on_hold_expire_duration', 'on_hold_timeout'), self::PUT);
    }

    public function editUserById($id, $expire = null, $data_limit = null, $group_ids = null, $proxy_settings = null, $status = 'active', $note = null, $data_limit_reset_strategy = null, $on_hold_expire_duration = null, $on_hold_timeout = null, $next_plan = null)
    {
        return $this->request('/api/user/by-id/' . $id, compact('expire', 'data_limit', 'group_ids', 'proxy_settings', 'status', 'note', 'data_limit_reset_strategy', 'on_hold_expire_duration', 'on_hold_timeout'), self::PUT);
    }

    public function removeUser($username)
    {
        return $this->request('/api/user/' . $username, [], self::DELETE);
    }

    public function removeUserByUsername($username)
    {
        return $this->request('/api/user/by-username/' . $username, [], self::DELETE);
    }

    public function removeUserById($id)
    {
        return $this->request('/api/user/by-id/' . $id, [], self::DELETE);
    }

    public function resetUser($username)
    {
        return $this->request('/api/user/' . $username . '/reset', [], self::POST);
    }

    public function resetUserByUsername($username)
    {
        return $this->request('/api/user/by-username/' . $username . '/reset', [], self::POST);
    }

    public function resetUserById($id)
    {
        return $this->request('/api/user/by-id/' . $id . '/reset', [], self::POST);
    }

    public function resetUsers()
    {
        return $this->request('/api/users/reset', [], self::POST);
    }

    public function chartSubUpdate($user_id = null, $username = null, $admin_id = null)
    {
        return $this->request('/api/users/sub_update/chart', compact('user_id', 'username', 'admin_id'), self::GET);
    }

    public function revokeSubUser($username)
    {
        return $this->request('/api/user/' . $username . '/revoke_sub', [], self::POST);
    }

    public function revokeSubUserByUsername($username)
    {
        return $this->request('/api/user/by-username/' . $username . '/revoke_sub', [], self::POST);
    }

    public function revokeSubUserById($id)
    {
        return $this->request('/api/user/by-id/' . $id . '/revoke_sub', [], self::POST);
    }

    public function userSetOwner($username, $admin_username)
    {
        return $this->request('/api/user/' . $username . '/set_owner', compact('admin_username'), self::POST);
    }

    public function userSetOwnerByUsername($username, $admin_username)
    {
        return $this->request('/api/user/by-username/' . $username . '/set_owner', compact('admin_username'), self::POST);
    }

    public function userSetOwnerById($id, $admin_username)
    {
        return $this->request('/api/user/by-id/' . $id . '/set_owner', compact('admin_username'), self::POST);
    }

    public function activeNextPlan($username)
    {
        return $this->request('/api/user/' . $username . '/active_next', [], self::POST);
    }

    public function activeNextPlanByUsername($username)
    {
        return $this->request('/api/user/by-username/' . $username . '/active_next', [], self::POST);
    }

    public function activeNextPlanById($id)
    {
        return $this->request('/api/user/by-id/' . $id . '/active_next', [], self::POST);
    }

    public function getUserSubscription($user_id, $client_type)
    {
        return $this->request('/api/user/' . $user_id . '/subscription/' . $client_type, [], self::GET);
    }

    public function userSubUpdate($username, $offset = 0, $limit = 10)
    {
        return $this->request('/api/user/' . $username . '/sub_update', compact('offset', 'limit'), self::GET);
    }

    public function userSubUpdateByUsername($username, $offset = 0, $limit = 10)
    {
        return $this->request('/api/user/by-username/' . $username . '/sub_update', compact('offset', 'limit'), self::GET);
    }

    public function userSubUpdateById($id, $offset = 0, $limit = 10)
    {
        return $this->request('/api/user/by-id/' . $id . '/sub_update', compact('offset', 'limit'), self::GET);
    }

    public function getUsers($offset = 0, $limit = 0, $username = null, $status = null, $sort = null)
    {
        return $this->request('/api/users', compact('offset', 'limit', 'username', 'status', 'sort'), self::GET);
    }

    public function getUsersSimple($ids = null, $offset = 0, $limit = 0, $usernames = null, $status = null, $sort = null)
    {
        return $this->request('/api/users/simple', compact('ids', 'offset', 'limit', 'usernames', 'status', 'sort'), self::GET);
    }

    public function usageUser($username, $period = 'hour', $node_id = null, $start = null, $end = null)
    {
        return $this->request('/api/user/' . $username . '/usage', compact('start', 'period', 'end', 'node_id'), self::GET);
    }

    public function usageUserByUsername($username, $period = 'hour', $node_id = null, $start = null, $end = null)
    {
        return $this->request('/api/user/by-username/' . $username . '/usage', compact('start', 'period', 'end', 'node_id'), self::GET);
    }

    public function usageUserById($id, $period = 'hour', $node_id = null, $start = null, $end = null)
    {
        return $this->request('/api/user/by-id/' . $id . '/usage', compact('start', 'period', 'end', 'node_id'), self::GET);
    }

    public function usageUsers($period = 'hour', $node_id = null, $start = null, $end = null, $admin = null)
    {
        return $this->request('/api/users/usage', compact('start', 'period', 'end', 'node_id', 'admin'), self::GET);
    }

    public function userCountsMetric($metric, $period = 'hour', $node_id = null, $start = null, $end = null, $admin = null)
    {
        return $this->request('/api/users/counts/' . $metric, compact('start', 'period', 'end', 'node_id', 'admin'), self::GET);
    }

    public function getExpired($target = 'expired', $admin_username = null, $expired_after = null, $expired_before = null)
    {
        return $this->request('/api/users/expired', compact('target', 'admin_username', 'expired_after', 'expired_before'), self::GET);
    }

    public function removeExpired($passed_time = null)
    {
        return $this->request('/api/users/expired', compact('passed_time'), self::DELETE);
    }

    public function addUserFromTemplate($user_template_id, $username, $note = null)
    {
        return $this->request('/api/user/from_template', compact('user_template_id', 'username', 'note'), self::POST);
    }

    public function bulkAddUserFromTemplate($user_template_id, $username, $count = 1, $strategy = 'random', $start_number = 0, $note = null)
    {
        return $this->request('/api/user/bulk/from_template', compact('user_template_id', 'username', 'count', 'strategy', 'start_number', 'note'), self::POST);
    }

    public function modifyUserFromTemplate($user_template_id, $username, $note = null)
    {
        return $this->request('/api/user/from_template/' . $username, compact('user_template_id', 'note'), self::PUT);
    }

    public function modifyUserFromTemplateByUsername($user_template_id, $username, $note = null)
    {
        return $this->request('/api/user/from_template/by-username/' . $username, compact('user_template_id', 'note'), self::PUT);
    }

    public function modifyUserFromTemplateById($user_template_id, $id, $note = null)
    {
        return $this->request('/api/user/from_template/by-id/' . $id, compact('user_template_id', 'note'), self::PUT);
    }

    public function bulkApplyTemplate($user_template_id, $ids, $note = null)
    {
        return $this->request('/api/user/bulk/apply_template', compact('user_template_id', 'ids', 'note'), self::POST);
    }

    public function editUserFromTemplate($user_template_id, $username, $note = null)
    {
        return $this->request('/api/users/bulk/expire' . $username, compact('user_template_id', 'note'), self::PUT);
    }

    public function usersBulkExpire($amount, $group_ids = null, $user_ids = null, $admins = null, $status = null)
    {
        return $this->request('/api/users/bulk/expire', compact('group_ids', 'amount', 'user_ids', 'admins', 'status'), self::PUT);
    }

    public function usersBulkDelete($ids)
    {
        return $this->request('/api/users/bulk/delete', compact('ids'), self::POST);
    }

    public function usersBulkReset($ids)
    {
        return $this->request('/api/users/bulk/reset', compact('ids'), self::POST);
    }

    public function usersBulkDisable($ids)
    {
        return $this->request('/api/users/bulk/disable', compact('ids'), self::POST);
    }

    public function usersBulkEnable($ids)
    {
        return $this->request('/api/users/bulk/enable', compact('ids'), self::POST);
    }

    public function usersBulkRevokeSub($ids)
    {
        return $this->request('/api/users/bulk/revoke_sub', compact('ids'), self::POST);
    }

    public function usersBulkSetOwner($ids, $admin_username)
    {
        return $this->request('/api/users/bulk/set_owner', compact('ids', 'admin_username'), self::PUT);
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