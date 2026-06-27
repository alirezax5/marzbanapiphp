<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Setup extends Endpoint
{
    public function createOwner(): mixed
    {
        return $this->client->post('/api/setup/owner');
    }

    public function resetOwnerPassword(): mixed
    {
        return $this->client->patch('/api/setup/owner');
    }

    public function deleteOwner($key): mixed
    {
        return $this->client->delete('/api/setup/owner', ['key' => $key]);
    }

    public function upgradeOwner(): mixed
    {
        return $this->client->post('/api/setup/owner/upgrade');
    }


}