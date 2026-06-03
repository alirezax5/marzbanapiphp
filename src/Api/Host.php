<?php

namespace alirezax5\MarzbanApi\Api;

trait Host
{
    public function getHost($id)
    {
        return $this->request('/api/host/' . $id, [], self::GET);
    }

    public function editHost($id, $body)
    {
        return $this->request('/api/host/' . $id, $body, self::PUT);
    }

    public function removeHost($id)
    {
        return $this->request('/api/host/' . $id, [], self::DELETE);
    }

    public function getHosts($ids = null, $offset = null, $limit = null)
    {
        return $this->request('/api/hosts', compact('ids', 'offset', 'limit'), self::GET);
    }

    public function editHosts($body)
    {
        return $this->request('/api/hosts', $body, self::PUT);
    }

    public function createHost($body)
    {
        return $this->request('/api/host/', $body, self::POST);
    }

    public function bulkHostDelete()
    {
        return $this->request('/api/hosts/bulk/delete', [], self::POST);
    }

    public function bulkHostDisable()
    {
        return $this->request('/api/hosts/bulk/disable', [], self::POST);
    }

    public function bulkHostEnable()
    {
        return $this->request('/api/hosts/bulk/enable', [], self::POST);
    }
}