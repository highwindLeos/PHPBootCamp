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
    
    public function getImage() {
       return  $this->db->query('SELECT image FROM article');
    }
    
    public function getIcon() {
       return  $this->db->query('SELECT icon FROM article');
    }
    
    public function getArticle() {
       return  $this->db->query('SELECT article FROM article');
    }
    
    public function getView() {
       return  $this->db->query('SELECT allview FROM article');
    }
    
    public function getCount() {
       return  $this->db->query('SELECT count FROM article');
    }
    
    public function getDate() {
       return  $this->db->query('SELECT date FROM article');
    }
}
?>