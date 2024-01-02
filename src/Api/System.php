<?php

namespace alirezax5\MarzbanApi\Api;

trait System
{
    public function statsSystem()
    {
        return $this->request('/api/system');
    }

    public function inbounds()
    {
        return $this->request('/api/inbounds');
    }

    public function hosts()
    {
        return $this->request('/api/hosts');
    }

    public function editHosts($body)
    {
        return $this->request('/api/hosts', $body, self::PUT);
    }
}