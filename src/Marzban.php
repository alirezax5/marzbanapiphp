<?php

namespace alirezax5\MarzbanApi;

use alirezax5\MarzbanApi\Api\{Admins,
    ClientTemplate,
    Core,
    Groups,
    Host,
    Node,
    Settings,
    Subscription,
    System,
    User,
    UserHWID,
    UserTemplate};
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Marzban
{
    use Admins, Core, Node, Subscription, System, User, UserTemplate, Settings, Groups, ClientTemplate,Host,UserHWID;

    const DELETE = 'DELETE';
    const GET = 'GET';
    const PUT = 'PUT';
    const POST = 'POST';
    public $httpCode = 201;
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

    protected function request($path, $body = [], $httpMethod = 'GET')
    {
        $isTokenEndpoint = ($path === '/api/admin/token');

        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'PHP-Guzzle/' . PHP_VERSION,
            ],
            'timeout' => 30,
            'verify' => false,
        ];

        if ($this->getToken() !== null) {
            $options['headers']['Authorization'] = 'Bearer ' . $this->getToken();
        }

        if ($httpMethod === 'GET') {
            if (!empty($body)) {
                $options['query'] = $body;
            }
        } else {
            if ($isTokenEndpoint) {
                $options['form_params'] = $body;
            } else {
                $options['json'] = $body;
            }
        }

        if ($isTokenEndpoint) {
            $options['headers'] = [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
            ];
            if ($httpMethod === 'GET') {
                $options['query'] = $body;
                unset($options['form_params']);
            }
            unset($options['headers']['Authorization']);
        } else {
            if (in_array($httpMethod, ['POST', 'PUT'], true)) {
                $options['headers']['Content-Type'] = 'application/json';
            }
        }

        $client = new Client(['base_uri' => $this->url]);

        try {
            $response = $client->request($httpMethod, $path, $options);
            $this->httpCode = $response->getStatusCode();

            $body = $response->getBody()->getContents();
            $decoded = json_decode($body, true);

            return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $body;
        } catch (RequestException $e) {
            $this->httpCode = $e->getCode() ?? 0;
            return false;
        }
    }

    private function getUrl($path)
    {
        return $this->url . $path;
    }

}