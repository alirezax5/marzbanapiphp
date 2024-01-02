<?php

namespace alirezax5\MarzbanApi\Api;

trait UserTemplate
{
    public function getuserTemplates($offset = null, $limit = null)
    {
        return $this->request('/api/user_template', compact('offset', 'limit'), self::GET);
    }

    public function createuserTemplate($name, $data_limit = 0, $expire_duration = 0, $inbounds = '')
    {
        return $this->request('/api/user_template', compact('name', 'data_limit', 'expire_duration', 'inbounds'), self::POST);
    }

    public function geteuserTemplate($id)
    {
        return $this->request('/api/user_template/' . $id, [], self::POST);
    }

    public function editUserTemplate($id, $name, $data_limit = 0, $expire_duration = 0, $inbounds = '')
    {
        return $this->request('/api/user_template/' . $id, compact('name', 'data_limit', 'expire_duration', 'inbounds'), self::PUT);
    }
    public function remveUserTemplate($id)
    {
        return $this->request('/api/user_template/' . $id,[], self::PUT);
    }

}