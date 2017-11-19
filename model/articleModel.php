<?php
class articleModel
{
    protected $db;

    public function __construct(PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    public function getArticles() {
        $stmt = $this->db->prepare('SELECT * FROM articles ORDER BY id DESC'); # 내림차순 정렬 (id 기준)
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #All rows Fetch. return.
    }
    
    public function getUsers() {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #All rows Fetch. return.
    }
    
    public function getUserIconsById($id) {
        $stmt = $this->db->prepare('SELECT author,usericon FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row by articles.id.
    }
    
    public function getPicturesById($id) {
        $stmt = $this->db->prepare('SELECT * FROM pictures WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getCommentsByArticleId($articles_id) {
        $stmt = $this->db->prepare('SELECT * FROM comments JOIN users ON comments.users_id = users.id WHERE 
                                    articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $rows = array(); #빈 배열 선언.
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ #모든 데이터 베이스 row 를 반복해서 가져오며 row 배열에 담는다.
            $rows[] = $row;
        }
        return $rows; #array 1row by articles_id.
    }
    
    public function getLikeCnt($articles_id) {
        $stmt = $this->db->prepare('SELECT * FROM likes WHERE articles_id = :articles_id');
        $stmt->bindParam(':articles_id', $articles_id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

}
?>