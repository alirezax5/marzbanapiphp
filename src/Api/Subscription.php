<?php

namespace alirezax5\MarzbanApi\Api;

trait Subscription
{
    public function getSub($token, $useragent = 'V2ray')
    {
        return $this->request($this->subPath. $token . '/', [], self::GET);
    }

    public function getSubInfo($token)
    {
        return $this->request($this->subPath . $token . '/info', [], self::GET);
    }

    public function getSubByclient($token, $client_type = 'v2ray')
    {
        return $this->request($this->subPath . $token . '/' . $client_type, [], self::GET);
    }


}