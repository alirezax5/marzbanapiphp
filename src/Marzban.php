<?php

namespace alirezax5\MarzbanApi;

use alirezax5\MarzbanApi\Api\{Admins, Core, Groups, Node, Settings, Subscription, System, User, UserTemplate};

class Marzban
{
    use Admins, Core, Node, Subscription, System, User, UserTemplate,Settings,Groups;

    const DELETE = 'DELETE';
    const GET = 'GET';
    const PUT = 'PUT';
    const POST = 'POST';
    public $url = null;
    private $password = null;
    private $username = null;
    private $token = null;
    private $parameter = null;
    protected $subPath;

    public function __construct($url, $subPath = '/sub/')
    {
        $this->url = $url;
        $this->subPath = $subPath;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
        return $this;
    }

    public function getParameter()
    {
        return $this->parameter;
    }

    protected function request($path, $body = [], $httpMetHod = 'GET')
    {
        $data = $httpMetHod == 'POST' || $httpMetHod == 'PUT' ? json_encode($body) : http_build_query($body);
        if ($this->getToken() != null)
            $header = [
                'Accept: application/json',
                'Authorization: Bearer ' . $this->getToken(),
                'Content-Type: application/json'
            ];

        if ($path == '/api/admin/token') {
            $header = [
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json'
            ];
            $data = http_build_query($body);
        }


        $ch = curl_init();
        $options = [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->getUrl($path),
            CURLOPT_POST => $httpMetHod == 'POST' ? true : false,
            CURLOPT_CUSTOMREQUEST => $httpMetHod,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER => $header
        ];

        curl_setopt_array($ch, $options);
        $res = curl_exec($ch);
        return json_decode($res, true);
    }

    private function getUrl($path)
    {

        return $this->url . $path;
    }

}