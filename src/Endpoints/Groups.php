<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Groups extends Endpoint
{
    public function all(
        $array
    ): mixed {
        return $this->client->get(
            '/api/groups',$array
        );
    }

    public function simple(
        $array
    ): mixed {
        return $this->client->get(
            '/api/groups/simple',$array
        );
    }

    public function get(
        int|string $id
    ): mixed {
        return $this->client->get(
            "/api/group/{$id}"
        );
    }

    public function create(
        array $data
    ): mixed {
        return $this->client->post(
            '/api/group',
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function update(
        int|string $id,
        array $data
    ): mixed {
        return $this->client->put(
            "/api/group/{$id}",
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function delete(
        int|string $id
    ): mixed {
        return $this->client->delete(
            "/api/group/{$id}"
        );
    }

    public function bulkAdd(
        array $data
    ): mixed {
        return $this->client->post(
            '/api/groups/bulk/add',
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function bulkRemove(
        array $data
    ): mixed {
        return $this->client->post(
            '/api/groups/bulk/remove',
            array_filter(
                $data,
                fn ($v) => $v !== null
            )
        );
    }

    public function bulkDelete(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/groups/bulk/delete',
            [
                'ids' => $ids,
            ]
        );
    }

    public function bulkDisable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/groups/bulk/disable',
            [
                'ids' => $ids,
            ]
        );
    }

    public function bulkEnable(
        array $ids
    ): mixed {
        return $this->client->post(
            '/api/groups/bulk/enable',
            [
                'ids' => $ids,
            ]
        );
    }
}