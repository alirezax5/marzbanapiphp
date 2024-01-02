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

    public function getAdmins()
    {
        return $this->request('/api/admins');
    }

    public function createAdmin($username, $password, $is_sudo = false)
    {
        return $this->request('/api/admin', compact('username', 'password', 'is_sudo'), self::POST);
    }

    public function editAdmin($username, $password, $is_sudo = false)
    {
        return $this->request('/api/admin/' . $username, compact('password', 'is_sudo'), self::PUT);
    }

    public function deleteAdmin($username)
    {
        return $this->request('/api/admin/' . $username, [], self::DELETE);
    }
}