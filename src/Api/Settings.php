<?php

namespace alirezax5\MarzbanApi\Api;

trait Settings
{

    public function getSettings()
    {
        return $this->request('/api/settings');
    }

    public function editSettings($body)
    {
        return $this->request('/api/settings',$body,self::PUT);
    }

    public function editGeneral($body)
    {
        return $this->request('/api/settings/general',$body);
    }


}