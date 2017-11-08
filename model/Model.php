<?php
class Model
{
    protected $db;

    public function __construct(PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    public function getArticles() {
        $stmt = $this->db->prepare('SELECT * FROM articles');
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPictures($article_id) {
        $stmt = $this->db->prepare('SELECT * FROM pictuers WHERE id = :id');
        $stmt->bindParam(':id', $article_id, PDO::PARAM_INT);
        $stmt->execute(); 
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>