<?php
class Model
{
    protected $db;

    public function __construct(PDO $db)  #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
    {
        $this->db = $db;
    }

    public function getAlls() {
       return  $this->db->query('SELECT * FROM article');
    }
    
}
?>