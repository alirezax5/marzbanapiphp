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

    public function addNode($name, $address, $core_config_id, $server_ca, $port = '62050', $api_port = '62051', $connection_type = 'rest', $gather_logs = true, $keep_alive = 60, $max_logs = 1000, $usage_coefficient = '1')
    {
        return $this->request('/api/node/{node_id}', compact('name', 'address', 'core_config_id', 'server_ca', 'port', 'api_port', 'connection_type', 'gather_logs', 'keep_alive', 'max_logs', 'usage_coefficient'), self::POST);
    }

    public function getNode($node_id)
    {
        return $this->request('/api/node/' . $node_id);
    }

    public function editNode($node_id, $name, $address, $core_config_id, $server_ca, $port = '62050', $api_port = '62051', $connection_type = 'rest', $gather_logs = true, $keep_alive = 60, $max_logs = 1000, $usage_coefficient = '1')
    {
        return $this->request('/api/node/' . $node_id, compact('name', 'address', 'core_config_id', 'server_ca', 'port', 'api_port', 'connection_type', 'gather_logs', 'keep_alive', 'max_logs', 'usage_coefficient'), self::PUT);
    }

    public function removeNode($node_id)
    {
        return $this->request('/api/node/' . $node_id, [], self::DELETE);
    }

    public function reconnectNode($node_id)
    {
        return $this->request('/api/node/' . $node_id . '/reconnect', [], self::POST);
    }

    public function syncNode($node_id, $flush_users)
    {
        return $this->request('/api/node/' . $node_id . '/sync', compact('flush_users'), self::PUT);
    }

    public function nodeLogs($node_id)
    {
        return $this->request('/api/node/' . $node_id . '/sync', [], self::GET);
    }

    public function nodeStats($node_id, $start, $end, $period = 'hour')
    {
        return $this->request('/api/node/' . $node_id . '/stats', compact('start', 'end', 'period'), self::GET);
    }

    public function nodeRealtimeStats($node_id)
    {
        return $this->request('/api/node/' . $node_id . '/realtime_stats', [], self::GET);
    }

    public function nodesRealtimeStats()
    {
        return $this->request('/api/nodes/realtime_stats', [], self::GET);
    }


    public function nodeUserOnlineIp($node_id, $username)
    {
        return $this->request('/api/node/' . $node_id . '/online_stats/' . $username . '/ip', [], self::GET);
    }

    public function nodeClearUsageData($start, $end, $table = 'node_user_usages')
    {
        return $this->request('/api/nodes/clear_usage_data/' . $table, compact('start', 'end'), self::DELETE);
    }

}