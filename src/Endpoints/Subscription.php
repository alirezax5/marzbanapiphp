<?php

namespace alirezax5\MarzbanApi\Endpoints;

class Subscription extends Endpoint
{
    public function getSub(
        string $token,
        string $useragent = 'V2ray'
    ): mixed
    {
        return $this->client->get(
            $this->client->getSubPath() . $token . '/'
        );
    }

    public function getSubInfo(
        string $token
    ): mixed
    {
        return $this->client->get(
            $this->client->getSubPath() . $token . '/info'
        );
    }

    public function getSubByClient(
        string $token,
        string $client_type = 'v2ray'
    ): mixed
    {
        return $this->client->get(
            $this->client->getSubPath() . $token . '/' . $client_type
        );
    }

    public function getSubUsage(
        string $token,
        ?int   $start = null,
        ?int   $end = null,
        string $period = 'hour'
    ): mixed
    {
        return $this->client->get(
            $this->client->getSubPath() . $token . '/usage',
            array_filter(
                compact(
                    'start',
                    'end',
                    'period'
                ),
                fn($v) => $v !== null
            )
        );
    }
}