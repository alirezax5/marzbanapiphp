<?php

namespace alirezax5\MarzbanApi\Endpoints;

class AdminRoles extends Endpoint
{
    public function getRoles($array): mixed
    {
        return $this->client->get('/api/admin-roles', $array);
    }

    public function getRolesSimple(): mixed
    {
        return $this->client->get('/api/admin-roles/simple');
    }

    public function getRole($role_id): mixed
    {
        return $this->client->get('/api/admin-role/' . $role_id);
    }

    public function modifyRole($role_id, $array): mixed
    {
        return $this->client->put('/api/admin-role/' . $role_id, $array);
    }

    public function deleteRole($role_id): mixed
    {
        return $this->client->delete('/api/admin-role/' . $role_id);
    }

    public function createRole($array): mixed
    {
        return $this->client->delete('/api/admin-role', $array);
    }

}