<?php

namespace alirezax5\MarzbanApi\Api;

trait Core
{
    public function getCores()
    {
        return $this->request('/api/cores');
    }

    public function getCore($core_id)
    {
        return $this->request('/api/core/' . $core_id);
    }

    public function createCore($body)
    {
        return $this->request('/api/core/', $body, self::POST);
    }

    public function restartCore($core_id)
    {
        return $this->request('/api/core/' . $core_id . '/restart', [], self::POST);
    }

    public function getCoreConfig()
    {
        return $this->request('/api/core/config');
    }

    public function editCore($core_id, $body, $restart_nodes = true)
    {
        return $this->request('/api/core/' . $core_id . '?restart_nodes=' . $restart_nodes, $body, self::PUT);
    }

    public function removeCore($core_id)
    {
        return $this->request('/api/core/' . $core_id, [], self::DELETE);
    }
}