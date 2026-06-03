<?php

namespace alirezax5\MarzbanApi\Api;

trait UserHWID
{
    public function getHwids($user_id)
    {
        return $this->request('/api/user/' . $user_id . '/hwids', [], self::GET);
    }

    public function deleteHwids($user_id, $hwid)
    {
        return $this->request('/api/user/' . $user_id . '/hwids/' . $hwid, [], self::DELETE);
    }

    public function rsetHwids($user_id)
    {
        return $this->request('/api/user/' . $user_id . '/hwids/reset', [], self::POST);
    }

}