<?php
class Model
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAlls() {
        return $this->db->query('SELECT * FROM artile');
    }
}
?>