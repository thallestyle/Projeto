<?php
namespace Foundation\Database;

use Container;

abstract class Model
{
    /**
     * @var Db
     */
    protected $db;

    public function __construct()
    {
        $this->db = Container::get('base.database.db');
    }

    protected abstract function getTableName();

    public function getById($id, array $fields = ['*'])
    {
        $fields = $this->parseFields($fields);

        $query = "SELECT $fields FROM {$this->getTableName()} WHERE id = :id";

        $where = [
            'id' => $id
        ];

        return $this->db->select($query, $where, false);
    }

    public function getAll(array $fields = ['*'])
    {
        $fields = $this->parseFields($fields);

        $query = "SELECT $fields FROM {$this->getTableName()}";

        return $this->db->select($query, [], true);
    }

    public function insert(array $data = [])
    {
        return $this->db->insert($this->getTableName(), $data);
    }

    public function updateById($id, array $data = [])
    {
        $where = sprintf('id = %s', (int) $id);

        return $this->db->update($this->getTableName(), $data, $where);
    }

    protected function parseFields(array $fields = [])
    {
        return implode(',', $fields);
    }
}
