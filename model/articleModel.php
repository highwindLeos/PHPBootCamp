<?php
class articleModel
{
    protected $db;

    public function __construct(PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    public function getArticlesCount() { # 행의 갯수를 세는 함수. count(*)

        $selectSql = 'SELECT count(*) FROM articles';

        $stmt = $this->db->prepare($selectSql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_NUM); #All rows Fetch. return.
    }

    public function getArticlesMaxId() { # 해당 열의 최고 값을 가져온다. MAX() 

        $selectSql = "SELECT MAX(articles.id) FROM anicoboard.articles";

        $stmt = $this->db->prepare($selectSql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_NUM); #All rows Fetch. return.
    }

    public function getArticles($Selectpoint, $pageList) {

        $selectSql = 'SELECT * FROM articles ORDER BY id DESC LIMIT '.$Selectpoint.','.$pageList;

        $stmt = $this->db->prepare($selectSql); # 내림차순 정렬 (id 기준)
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #All rows Fetch. return.
    }
    
    public function getUsers() {

        $selectSql = 'SELECT * FROM users';

        $stmt = $this->db->prepare($selectSql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #All rows Fetch. return.
    }
    
    public function getPictures($id) {

        $selectSql = 'SELECT * FROM pictures WHERE id = :id';

        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row by Id.
    }
    
    public function getUserIcons($id) {

        $selectSql = 'SELECT author,usericon FROM users WHERE id = :id';
        
        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row by id.
    }
    
     public function getArticlesById($id) {

        $selectSql = 'SELECT * FROM articles WHERE id = :id';
        
        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row by id.
    }
    
    public function getComments($articles_id) {

        $selectSql = 'SELECT * FROM comments JOIN users ON comments.users_id = users.id 
                      WHERE articles_id = :articles_id';
        
        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':articles_id', $articles_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $rows = array(); #빈 배열 선언.
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ #모든 데이터 베이스 row(행) 를 반복해서 가져오며 rows 배열에 담는다.
            $rows[] = $row;
        }
        return $rows; # $rows array return.
    }
    
    public function getLikeCnt($articles_id) {
        
        $selectSql = "SELECT * FROM likes WHERE articles_id = :articles_id";

        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':articles_id', $articles_id, PDO::PARAM_INT);
        $stmt->execute(); 
        
        $rows = array(); #빈 배열 선언.
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ #모든 데이터 베이스 row(행) 를 반복해서 가져오며 rows 배열에 담는다.
            $rows[] = $row;
        }
        return $rows; # $rows array return.
    }

}
?>