<?php

namespace alirezax5\MarzbanApi\Api;

trait ClientTemplate
{
    public function getClientTemplates($ids = null, $template_type = null, $offset = null, $limit = null)
    {
        return $this->request('/api/user_template', compact('ids', 'template_type', 'offset', 'limit'), self::GET);
    }

    public function createClientTemplate($name, $template_type, $content, $is_default)
    {
        return $this->request('/api/client_template', compact('name', 'template_type', 'content', 'is_default'), self::POST);
    }

    public function createClientTemplateSimple($ids = null, $offset = 0, $limit = 10, $search = null, $all = false)
    {
        return $this->request('/api/client_template/simple', compact('offset', 'limit', 'ids', 'search', 'all'));
    }

    public function getClientTemplate($id)
    {
        return $this->request('/api/client_template/' . $id, [], self::POST);
    }

    public function bulkClientTemplateDelete($ids)
    {
        return $this->request('/api/client_template/bulk/delete', compact('ids'), self::POST);
    }

    public function editClientTemplate($id, $body)
    {
        return $this->request('/api/user_template/' . $id, $body, self::PUT);
    }

    public function removeClientTemplate($id)
    {
        return $this->request('/api/user_template/' . $id, [], self::DELETE);
    }

}