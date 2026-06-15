<?php

namespace alirezax5\MarzbanApi;

use alirezax5\MarzbanApi\Endpoints\Admin;
use alirezax5\MarzbanApi\Endpoints\ClientTemplate;
use alirezax5\MarzbanApi\Endpoints\Core;
use alirezax5\MarzbanApi\Endpoints\Groups;
use alirezax5\MarzbanApi\Endpoints\Host;
use alirezax5\MarzbanApi\Endpoints\Node;
use alirezax5\MarzbanApi\Endpoints\Settings;
use alirezax5\MarzbanApi\Endpoints\Subscription;
use alirezax5\MarzbanApi\Endpoints\System;
use alirezax5\MarzbanApi\Endpoints\User;
use alirezax5\MarzbanApi\Endpoints\UserHWID;
use alirezax5\MarzbanApi\Endpoints\UserTemplate;
use alirezax5\MarzbanApi\Http\HttpClient;
use GuzzleHttp\Client;

class Marzban
{
    private string $url;
    private HttpClient $client;
    private ?string $token = null;

    public Admin $admin;
    public ClientTemplate $clientTemplate;
    public Core $core;
    public Groups $groups;
    public Host $host;
    public Node $node;
    public Settings $settings;
    public Subscription $subscription;
    public System $system;
    public User $user;
    public UserHWID $userHWID;
    public UserTemplate $userTemplate;

    public function __construct(string $url, string $subPath = '/sub/')
    {
        $this->url = $url;

        $this->client = new HttpClient(
            new Client([
                'base_uri' => $this->url,
            ]),
            $subPath
        );

        $this->admin = new Admin($this->client);
        $this->clientTemplate = new ClientTemplate($this->client);
        $this->core = new Core($this->client);
        $this->groups = new Groups($this->client);
        $this->host = new Host($this->client);
        $this->node = new Node($this->client);
        $this->settings = new Settings($this->client);
        $this->subscription = new Subscription($this->client);
        $this->system = new System($this->client);
        $this->user = new User($this->client);
        $this->userHWID = new UserHWID($this->client);
        $this->userTemplate = new UserTemplate($this->client);
    }

    public function setToken(string $token): self
    {
        $this->token = $token;
        $this->client->setToken($token);
        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }
}