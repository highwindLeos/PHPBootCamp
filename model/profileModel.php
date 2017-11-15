<?php
class profileModel
{
    protected $db;

    public function __construct(PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    
    public function getUsers() {
        $stmt = $this->db->prepare('SELECT email,author,usericon FROM users');
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUserIconByEmail($email) {
        $stmt = $this->db->prepare('SELECT author,usericon FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row by email.
    }
    
    public function getPictureByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM anicoboard.pictures LEFT JOIN anicoboard.users 
                                    ON pictures.articles_id = users.id WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); #array rows by Email.
    }
}
?>