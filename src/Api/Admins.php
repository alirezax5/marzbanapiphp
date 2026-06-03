<?php

namespace alirezax5\MarzbanApi\Api;

trait Admins
{
    public function getAdminToken()
    {
        return $this->request('/api/admin/token', ['username' => $this->getUsername(), 'password' => $this->getPassword()], self::POST);
    }

    public function getAdminMiniAppToken()
    {
        return $this->request('/api/admin/miniapp/token', null, self::POST);
    }

    public function getAdmin()
    {
        return $this->request('/api/admin');
    }

    public function getAdmins($username = null, $offset = 0, $limit = 10)
    {
        return $this->request('/api/admins', compact('username', 'offset', 'limit'));
    }

    public function getAdminsSimple($username = null, $search = null, $offset = 0, $limit = 10, $sort = null, $all = false)
    {
        return $this->request('/api/admins/simple', compact('username', 'search', 'offset', 'limit', 'sort', 'all'));
    }

    public function createAdmin($username, $password, $is_sudo = false, $is_disabled = false, $telegram_id = 0, $discord_webhook = null, $discord_id = null, $sub_template = null, $sub_domain = null, $profile_title = null, $support_url = null)
    {
        return $this->request('/api/admin', compact('username', 'password', 'is_sudo', 'is_disabled', 'telegram_id', 'discord_id', 'discord_webhook', 'sub_template', 'sub_domain', 'profile_title', 'support_url'), self::POST);
    }

    public function editAdmin($username, $password, $is_sudo = false, $is_disabled = false, $telegram_id = 0, $discord_webhook = null, $discord_id = null, $sub_template = null, $sub_domain = null, $profile_title = null, $support_url = null, $note = null)
    {
        return $this->request('/api/admin/' . $username, compact('password', 'is_sudo', 'is_disabled', 'telegram_id', 'discord_id', 'discord_webhook', 'sub_template', 'sub_domain', 'profile_title', 'support_url', 'note'), self::PUT);
    }

    public function editAdminById($admin_id, $password, $is_sudo = false, $is_disabled = false, $telegram_id = 0, $discord_webhook = null, $discord_id = null, $sub_template = null, $sub_domain = null, $profile_title = null, $support_url = null, $note = null)
    {
        return $this->request('/api/admin/by-id/' . $admin_id, compact('password', 'is_sudo', 'is_disabled', 'telegram_id', 'discord_id', 'discord_webhook', 'sub_template', 'sub_domain', 'profile_title', 'support_url', 'note'), self::PUT);
    }

    public function deleteAdmin($username)
    {
        return $this->request('/api/admin/' . $username, [], self::DELETE);
    }

    public function deleteAdminById($admin_id)
    {
        return $this->request('/api/admin/by-id/' . $admin_id, [], self::DELETE);
    }

    public function disableAllActiveAdminUsers($username)
    {
        return $this->request('/api/admin/' . $username . '/users/disable', [], self::POST);
    }

    public function disableAllActiveAdminUsersByUsername($username)
    {
        return $this->request('/api/admin/by-username/' . $username . '/users/disable', [], self::POST);
    }

    public function disableAllActiveAdminUsersById($id)
    {
        return $this->request('/api/admin/by-id/' . $id . '/users/disable', [], self::POST);
    }

    public function activateAllActiveAdminUsers($username)
    {
        return $this->request('/api/admin/' . $username . '/users/activate', [], self::POST);
    }

    public function activateAllActiveAdminUsersByUsername($username)
    {
        return $this->request('/api/admin/by-username/' . $username . '/users/activate', [], self::POST);
    }

    public function activateAllActiveAdminUsersById($id)
    {
        return $this->request('/api/admin/by-id/' . $id . '/users/activate', [], self::POST);
    }

    public function getAdminUsage($username, $period = 'day', $node_id = null, $group_by_node = false, $start = null, $end = null)
    {
        return $this->request('/api/admin/' . $username . '/usage', compact('period', 'node_id', 'group_by_node', 'start', 'end'), self::POST);
    }

    public function getAdminUsageByUsername($username, $period = 'day', $node_id = null, $group_by_node = false, $start = null, $end = null)
    {
        return $this->request('/api/admin/by-username' . $username . '/usage', compact('period', 'node_id', 'group_by_node', 'start', 'end'), self::POST);
    }

    public function getAdminUsageById($id, $period = 'day', $node_id = null, $group_by_node = false, $start = null, $end = null)
    {
        return $this->request('/api/admin/by-id' . $id . '/usage', compact('period', 'node_id', 'group_by_node', 'start', 'end'), self::POST);
    }

    public function resetAdminUsage($username)
    {
        return $this->request('/api/admin/' . $username . '/reset', [], self::POST);
    }

    public function resetAdminUsageByUsername($username)
    {
        return $this->request('/api/admin/by-username/' . $username . '/reset', [], self::POST);
    }

    public function resetAdminUsageById($username)
    {
        return $this->request('/api/admin/by-id/' . $username . '/reset', [], self::POST);
    }

    public function removeAllUsers($username)
    {
        return $this->request('/api/admin/' . $username . 'users', [], self::DELETE);
    }

    public function removeAllUsersByUsername($username)
    {
        return $this->request('/api/admin/by-username/' . $username . 'users', [], self::DELETE);
    }

    public function removeAllUsersById($admin_id)
    {
        return $this->request('/api/admin/by-id/' . $admin_id . 'users', [], self::DELETE);
    }

    public function bulkDeleteAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/delete', $usernames, self::POST);
    }

    public function resetBulkAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/reset', $usernames, self::POST);
    }

    public function disableBulkAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/disable', $usernames, self::POST);
    }

    public function enableBulkAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/enable', $usernames, self::POST);
    }

    public function disableBulkAllUsersAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/users/disable', $usernames, self::POST);
    }

    public function enableBulkAllUsersAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/users/enable', $usernames, self::POST);
    }

    public function deleteBulkAllUsersAdmins($usernames)
    {
        return $this->request('/api/admin/bulk/users', $usernames, self::DELETE);
    }

}