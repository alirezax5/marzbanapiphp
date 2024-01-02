<?php

namespace alirezax5\MarzbanApi\Api;

trait Node
{
    public function nodeSettings()
    {
        return $this->request('/api/node/settings');
    }

    public function getNodes()
    {
        return $this->request('/api/nodes');
    }

    public function usageNodes()
    {
        return $this->request('/api/nodes/usage');
    }

    public function addNode($name, $address, $port = '62050', $api_port = '62051', $add_as_new_host = true, $usage_coefficient = '1')
    {
        return $this->request('/api/node/{node_id}', compact('name', 'address', 'port', 'api_port' . 'add_as_new_host', 'usage_coefficient'), self::POST);
    }

    public function getNode($node_id)
    {
        return $this->request('/api/node/' . $node_id);
    }

    public function editNode($node_id, $name, $address, $port = '62050', $api_port = '62051', $add_as_new_host = true, $usage_coefficient = '1')
    {
        return $this->request('/api/node/' . $node_id, compact('name', 'address', 'port', 'api_port' . 'add_as_new_host', 'usage_coefficient'), self::PUT);
    }

    public function removeNode($node_id)
    {
        return $this->request('/api/node/' . $node_id, [], self::DELETE);
    }

    public function reconnectNode($node_id)
    {
        return $this->request('/api/node/' . $node_id . '/reconnect', [], self::POST);
    }


}