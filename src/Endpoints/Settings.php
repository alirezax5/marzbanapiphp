<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Settings extends Endpoint
{
    public function getSettings(): mixed
    {
        return $this->client->get(
            '/api/settings'
        );
    }

    public function editSettings(
        array $body
    ): mixed {
        return $this->client->put(
            '/api/settings',
            $body
        );
    }

    public function getGeneral(

    ): mixed {
        return $this->client->get(
            '/api/settings/general'
        );
    }
}