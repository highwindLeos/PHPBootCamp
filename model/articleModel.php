<?php
class articleModel
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
    
    public function getUsers() {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPictures($id) {
        $stmt = $this->db->prepare('SELECT * FROM pictures WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getUserIcons($id) {
        $stmt = $this->db->prepare('SELECT author,usericon FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getComments($user_id) {
        $stmt = $this->db->prepare('SELECT * FROM comments WHERE id = :user_id');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getLikeCnt($articles_id) {
        $stmt = $this->db->prepare('SELECT * FROM likes WHERE articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>