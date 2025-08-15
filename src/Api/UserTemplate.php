<?php

namespace alirezax5\MarzbanApi\Api;

trait UserTemplate
{
    public function getUserTemplates($offset = null, $limit = null)
    {
        return $this->request('/api/user_template', compact('offset', 'limit'), self::GET);
    }

    public function createUserTemplate($name, $data_limit = 0, $expire_duration = 0, $group_ids = null)
    {
        return $this->request('/api/user_template', compact('name', 'data_limit', 'expire_duration', 'group_ids'), self::POST);
    }

    public function getUserTemplate($id)
    {
        return $this->request('/api/user_template/' . $id, [], self::POST);
    }

    public function editUserTemplate($id, $body)
    {
        return $this->request('/api/user_template/' . $id, $body, self::PUT);
    }

    public function removeUserTemplate($id)
    {
        return $this->request('/api/user_template/' . $id, [], self::DELETE);
    }

}