<?php

namespace alirezax5\MarzbanApi\Api;

trait User
{
    public function addUser($username, $expire, $data_limit, $proxies = ['vless'=>[],'vmess'=>[],'trojan'=>[]],$inbounds = null,$status ='active',$note= '',$data_limit_reset_strategy = 'no_reset',$on_hold_expire_duration = 0,$on_hold_timeout = '2046-11-03T20:30:00')
    {
        if ($inbounds == null)
            return $this->request('/api/user', compact('username', 'expire', 'data_limit', 'proxies','status','note','data_limit_reset_strategy','on_hold_expire_duration','on_hold_timeout'), self::POST);

        return $this->request('/api/user', compact('username', 'expire', 'data_limit', 'proxies','inbounds','status','note','data_limit_reset_strategy','on_hold_expire_duration','on_hold_timeout'), self::POST);
    }

    public function getUser($username)
    {
        return $this->request('/api/user/' . $username, [], 'GET');
    }

    public function editUser($username, $expire, $data_limit, $proxies = '',$status ='active',$note= '',$data_limit_reset_strategy = 'no_reset',$on_hold_expire_duration = 0,$on_hold_timeout = '2043-11-03T20:30:00')
    {
        return $this->request('/api/user/' . $username, compact('expire', 'data_limit', 'proxies','status','note','data_limit_reset_strategy','on_hold_expire_duration','on_hold_timeout'), self::PUT);
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
}