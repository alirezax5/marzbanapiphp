<?php

namespace alirezax5\MarzbanApi\Api;

trait Admins
{
    public function getAdminToken()
    {
        return $this->request('/api/admin/token', ['username' => $this->getUsername(), 'password' => $this->getPassword()], self::POST);
    }

    public function getAdmin()
    {
        return $this->request('/api/admin');
    }

    public function getAdmins($username = null, $offset = 0, $limit = 10)
    {
        return $this->request('/api/admins', compact('username', 'offset', 'limit'));
    }

    public function createAdmin($username, $password, $is_sudo = false, $is_disabled = false, $telegram_id = 0, $discord_webhook = null, $discord_id = null, $sub_template = null, $sub_domain = null, $profile_title = null, $support_url = null)
    {
        return $this->request('/api/admin', compact('username', 'password', 'is_sudo', 'is_disabled', 'telegram_id', 'discord_id', 'discord_webhook', 'sub_template', 'sub_domain', 'profile_title', 'support_url'), self::POST);
    }

    public function editAdmin($username, $password, $is_sudo = false, $is_disabled = false, $telegram_id = 0, $discord_webhook = null, $discord_id = null, $sub_template = null, $sub_domain = null, $profile_title = null, $support_url = null)
    {
        return $this->request('/api/admin/' . $username, compact('password', 'is_sudo', 'is_disabled', 'telegram_id', 'discord_id', 'discord_webhook', 'sub_template', 'sub_domain', 'profile_title', 'support_url'), self::PUT);
    }

    public function deleteAdmin($username)
    {
        return $this->request('/api/admin/' . $username, [], self::DELETE);
    }

    public function disableAllActiveAdminUsers($username)
    {
        return $this->request('/api/admin/' . $username . '/users/disable', [], self::POST);
    }

    public function activateAllActiveAdminUsers($username)
    {
        return $this->request('/api/admin/' . $username . '/users/activate', [], self::POST);
    }

    public function resetAdminUsage ($username)
    {
        return $this->request('/api/admin/' . $username . '/reset', [], self::POST);
    }

}