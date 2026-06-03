<?php

namespace alirezax5\MarzbanApi\Api;

trait UserTemplate
{
    public function getUserTemplates($ids = null, $offset = null, $limit = null)
    {
        return $this->request('/api/user_template', compact('offset', 'limit', 'ids'), self::GET);
    }

    public function getUserTemplatesSimple($ids = null, $offset = 0, $limit = 10, $search = null, $all = false)
    {
        return $this->request('/api/user_template/simple', compact('offset', 'limit', 'ids', 'search', 'all'), self::GET);
    }

    public function createUserTemplate($name, $data_limit = 0, $expire_duration = 0, $group_ids = null)
    {
        return $this->request('/api/user_template', compact('name', 'data_limit', 'expire_duration', 'group_ids'), self::POST);
    }

    public function getUserTemplate($id)
    {
        return $this->request('/api/user_template/' . $id, [], self::POST);
    }

    public function editUserTemplate($id, $body)
    {
        return $this->request('/api/user_template/' . $id, $body, self::PUT);
    }

    public function removeUserTemplate($id)
    {
        return $this->request('/api/user_template/' . $id, [], self::DELETE);
    }

    public function bulkUserTemplateDelete($ids)
    {
        return $this->request('/api/user_templates/bulk/delete', compact('ids'), self::POST);
    }

    public function bulkUserTemplateDisable($ids)
    {
        return $this->request('/api/user_templates/bulk/disable', compact('ids'), self::POST);
    }

    public function bulkUserTemplateEnable($ids)
    {
        return $this->request('/api/user_templates/bulk/enable', compact('ids'), self::POST);
    }
}