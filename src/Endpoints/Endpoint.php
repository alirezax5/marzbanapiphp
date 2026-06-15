<?php

namespace alirezax5\MarzbanApi\Endpoints;

use alirezax5\MarzbanApi\Http\HttpClient;

abstract class Endpoint
{
    public function __construct(
        protected HttpClient $client
    ) {
    }
}