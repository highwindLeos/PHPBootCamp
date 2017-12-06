<?php
namespace DatabaseModel; #네임스페이스를 정의.

class profileModel
{
    protected $db;

    public function __construct(\PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    public function getUsers() {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getFollowingsByAuthor($author) { #최신 following순으로 정렬. 
        $stmt = $this->db->prepare('SELECT *, follows.id AS Fid, users.id AS Uid FROM follows JOIN users 
                                    ON follows.follow = users.id WHERE follower = :author ORDER BY Fid DESC;'); 
        $stmt->bindParam(':author', $author, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); #return array Allrows by author.
    }
    
    public function getFollowersByAuthor($author) { #최신 follower 순으로 정렬. 
        $stmt = $this->db->prepare('SELECT *, follows.id AS Fid, users.id AS Uid FROM follows JOIN users 
                                    ON follows.follow = users.id WHERE author = :author ORDER BY Fid DESC;'); 
        $stmt->bindParam(':author', $author, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); #return array Allrows by author.
    }
    
    public function getFollowersIconByAuthor($author) { #최신 follower ICON 순으로 정렬. 
        $stmt = $this->db->prepare('SELECT follows.id AS Fid, follow, follower, users_id, users.id AS Uid, 
                                    users.name, users.author, us.usericon  FROM follows JOIN users 
                                    ON follows.follow = users.id JOIN users AS us 
                                    ON follows.follower = us.author WHERE users.author = :author
                                    ORDER BY Fid DESC;'); # follower 아이콘 출력. 
        $stmt->bindParam(':author', $author, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); #return array Allrows by author.
    }
    
    public function getUserIconByAuthor($author) {
        $stmt = $this->db->prepare('SELECT id, author, usericon FROM users WHERE author = :author');
        $stmt->bindParam(':author', $author, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(\PDO::FETCH_ASSOC); #array 1row by Email.
    }
    
    public function getUserIconByEmail($email) {
        $stmt = $this->db->prepare('SELECT id, author, usericon FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(\PDO::FETCH_ASSOC); #array 1row by Email.
    }

    public function getPictureCountByAuthor($author) { # 행의 갯수를 세는 함수. count(*)
        $selectSql = 'SELECT count(*) FROM anicoboard.pictures LEFT JOIN anicoboard.articles ON pictures.articles_id = articles.id 
                      LEFT JOIN users AS Us ON articles.users_id = Us.id WHERE author = :author';

        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':author', $author, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_NUM); #return array Allrows by author.
    }
    
    public function getPictureByAuthor($author, $Selectpoint, $pageList) { #Main 최신 사진 순으로 정렬 (pictures.id Auto Increments)
        $selectSql = 'SELECT * FROM anicoboard.pictures LEFT JOIN anicoboard.articles ON pictures.articles_id = articles.id 
                      LEFT JOIN users AS Us ON articles.users_id = Us.id WHERE author = :author 
                      ORDER BY pictures.id DESC LIMIT '.$Selectpoint.','.$pageList;

        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':author', $author, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); #return array Allrows by author.
    }
    
    public function getPictureByEmail($email) { #Profile 최신 사진 순으로 정렬 (pictures.id Auto Increments)
        $stmt = $this->db->prepare('SELECT * FROM anicoboard.pictures LEFT JOIN anicoboard.users 
                                    ON pictures.articles_id = users.id WHERE email = :email ORDER BY pictures.id DESC');
        $stmt->bindParam(':email', $email, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); #return array rows by Email.
    }
    
}
?>