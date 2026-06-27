<?php

namespace alirezax5\MarzbanApi\Endpoints;

class System extends Endpoint
{
    public function stats(): mixed
    {
        return $this->client->get(
            '/api/system'
        );
    }

    public function resourcesStats(): mixed
    {
        return $this->client->get(
            '/api/system/resources'
        );
    }
    public function usersStats(): mixed
    {
        return $this->client->get(
            '/api/system/users'
        );
    }

    public function inbounds(): mixed
    {
        return $this->client->get(
            '/api/inbounds'
        );
    }

    public function inboundsDetails(): mixed
    {
        return $this->client->get(
            '/api/inbounds/details'
        );
    }

    public function workersHealth(): mixed
    {
        return $this->client->get(
            '/api/workers/health'
        );
    }
}