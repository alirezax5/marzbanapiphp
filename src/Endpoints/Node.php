<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Node extends Endpoint
{
    public function nodeSettings(): mixed
    {
        return $this->client->get(
            '/api/node/settings'
        );
    }

    public function getNodes(): mixed
    {
        return $this->client->get(
            '/api/nodes'
        );
    }

    public function getNodesSimple(
        $ids = null,
        int $offset = 0,
        int $limit = 10,
        $search = null,
        bool $all = false
    ): mixed {
        return $this->client->get(
            '/api/nodes/simple',
            array_filter(
                compact(
                    'offset',
                    'limit',
                    'ids',
                    'search',
                    'all'
                ),
                fn ($v) => $v !== null
            )
        );
    }

    public function reconnectAllNode(): mixed
    {
        return $this->client->post(
            '/api/nodes/reconnect'
        );
    }

    public function usageNodes(): mixed
    {
        return $this->client->get(
            '/api/nodes/usage'
        );
    }

    public function addNode(
        array $body
    ): mixed {
        return $this->client->post(
            '/api/node',
            $body
        );
    }

    public function getNode(
        $node_id
    ): mixed {
        return $this->client->get(
            "/api/node/{$node_id}"
        );
    }

    public function editNode(
        $node_id,
        array $body
    ): mixed {
        return $this->client->put(
            "/api/node/{$node_id}",
            $body
        );
    }

    public function removeNode(
        $node_id
    ): mixed {
        return $this->client->delete(
            "/api/node/{$node_id}"
        );
    }

    public function updateNode(
        $node_id
    ): mixed {
        return $this->client->post(
            "/api/node/{$node_id}/update"
        );
    }

    public function updateCoreNode(
        $node_id,
        $core_version
    ): mixed {
        return $this->client->post(
            "/api/node/{$node_id}/core_update",
            compact('core_version')
        );
    }

    public function updateGeoFilesNode(
        $node_id,
        $region
    ): mixed {
        return $this->client->post(
            "/api/node/{$node_id}/core_update",
            compact('region')
        );
    }

    public function resetNodeUsage(
        $node_id
    ): mixed {
        return $this->client->post(
            "/api/node/{$node_id}/reset"
        );
    }

    public function reconnectNode(
        $node_id
    ): mixed {
        return $this->client->post(
            "/api/node/{$node_id}/reconnect"
        );
    }

    public function syncNode(
        $node_id,
        $flush_users
    ): mixed {
        return $this->client->put(
            "/api/node/{$node_id}/sync",
            compact('flush_users')
        );
    }

    public function nodeLogs(
        $node_id
    ): mixed {
        return $this->client->get(
            "/api/node/{$node_id}/logs"
        );
    }

    public function nodeStats(
        $node_id,
        $start,
        $end,
        $period = 'hour'
    ): mixed {
        return $this->client->get(
            "/api/node/{$node_id}/stats",
            compact(
                'start',
                'end',
                'period'
            )
        );
    }

    public function nodeRealtimeStats(
        $node_id
    ): mixed {
        return $this->client->get(
            "/api/node/{$node_id}/realtime_stats"
        );
    }

    public function nodesRealtimeStats(): mixed
    {
        return $this->client->get(
            '/api/nodes/realtime_stats'
        );
    }

    public function nodeUserOnline(
        $node_id,
        $username
    ): mixed {
        return $this->client->get(
            "/api/node/{$node_id}/online_stats/{$username}"
        );
    }

    public function nodeUserOnlineIp(
        $node_id,
        $username
    ): mixed {
        return $this->client->get(
            "/api/node/{$node_id}/online_stats/{$username}/ip"
        );
    }

    public function nodeClearUsageData(
        $start,
        $end,
        $table = 'node_user_usages'
    ): mixed {
        return $this->client->delete(
            "/api/nodes/clear_usage_data/{$table}",
            [],
            compact(
                'start',
                'end'
            )
        );
    }

    public function bulkDeleteNode(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/nodes/bulk/delete',
            compact('ids')
        );
    }

    public function bulkDisableNode(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/nodes/bulk/disable',
            compact('ids')
        );
    }

    public function bulkEnableNode(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/nodes/bulk/enable',
            compact('ids')
        );
    }

    public function bulkResetNode(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/nodes/bulk/reset',
            compact('ids')
        );
    }

    public function bulkReconnectNode(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/nodes/bulk/reconnect',
            compact('ids')
        );
    }

    public function bulkUpdateNode(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/nodes/bulk/update',
            compact('ids')
        );
    }
}