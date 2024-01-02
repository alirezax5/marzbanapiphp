<?php

namespace alirezax5\MarzbanApi\Api;

trait Core
{
    public function getCoreStat()
    {
        return $this->request('/api/core');
    }

    public function restartCore()
    {
        return $this->request('/api/core/restart', [], self::POST);
    }

    public function getCoreConfig()
    {
        return $this->request('/api/core/config');
    }

    public function editCoreConfig($body)
    {
        return $this->request('/api/core/config', $body, self::PUT);
    }
}