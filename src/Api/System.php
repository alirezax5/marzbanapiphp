<?php

namespace alirezax5\MarzbanApi\Api;

trait System
{
    public function statsSystem()
    {
        return $this->request('/api/system');
    }

    public function inbounds()
    {
        return $this->request('/api/inbounds');
    }

    public function inboundsDetails()
    {
        return $this->request('/api/inbounds/details');
    }

    public function workersHealth()
    {
        return $this->request('/api/workers/health');
    }


}