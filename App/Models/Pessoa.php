<?php
namespace App\Models;

use Foundation\Database\Model;

class Pessoa extends Model
{
    public function getEventos($id)
    {
        $query = '
            SELECT
              e.*
            FROM
              evento e, pessoa_evento pe
            WHERE
              pe.pessoa = :id AND
              e.id = pe.evento
            ORDER BY
              e.data, e.hora_de
        ';

       return $this->db->select($query, ['id' => $id], true);
    }

    protected function getTableName()
    {
        return 'pessoa';
    }
}
