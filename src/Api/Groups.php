<?php

namespace alirezax5\MarzbanApi\Api;

trait Groups
{

    public function createGroup($name, $inbound_tags = [], $is_disabled = false)
    {
        return $this->request('/api/group', compact('name', 'inbound_tags', 'is_disabled'), self::POST);
    }

    public function getGroups($offset = 0, $limit = 10)
    {
        return $this->request('/api/groups', compact('offset', 'limit'));
    }

    public function getGroupsSimple($ids = null, $offset = 0, $limit = 10, $search = null, $all = false)
    {
        return $this->request('/api/groups/simple', compact('offset', 'limit', 'ids', 'search', 'all'));
    }

    public function getGroup($group_id)
    {
        return $this->request('/api/group/' . $group_id);
    }

    public function editGroup($group_id, $name, $inbound_tags = [], $is_disabled = false)
    {
        return $this->request('/api/group/' . $group_id, compact('name', 'inbound_tags', 'is_disabled'), self::PUT);
    }

    public function removeGroup($group_id)
    {
        return $this->request('/api/group/' . $group_id, [], self::DELETE);
    }

    public function groupBulkAdd($group_ids = [], $has_group_ids = [], $admins = [], $users = [])
    {
        return $this->request('/api/groups/bulk/add', compact('group_ids', 'has_group_ids', 'admins', 'users'), self::POST);
    }

    public function removeBulk($group_ids = [], $has_group_ids = [], $admins = [], $users = [])
    {
        return $this->request('/api/groups/bulk/remove', compact('group_ids', 'has_group_ids', 'admins', 'users'), self::POST);
    }
    public function deleteBulk($ids)
    {
        return $this->request('/api/groups/bulk/delete', compact('ids'), self::POST);
    }
    public function disableBulk($ids)
    {
        return $this->request('/api/groups/bulk/disable', compact('ids'), self::POST);
    }
    public function enableBulk($ids)
    {
        return $this->request('/api/groups/bulk/enable', compact('ids'), self::POST);
    }


}