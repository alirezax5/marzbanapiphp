<?php

namespace alirezax5\MarzbanApi\Endpoints;

class UserHWID extends Endpoint
{
    public function getHwids(
        int|string $user_id
    ): mixed {
        return $this->client->get(
            "/api/user/{$user_id}/hwids"
        );
    }

    public function deleteHwids(
        int|string $user_id,
        string $hwid
    ): mixed {
        return $this->client->delete(
            "/api/user/{$user_id}/hwids/{$hwid}"
        );
    }

    public function resetHwids(
        int|string $user_id
    ): mixed {
        return $this->client->post(
            "/api/user/{$user_id}/hwids/reset"
        );
    }
}