<?php
class loginModel
{
    protected $db;

    public function __construct(PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    public function getUsersByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_INT);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row return.
    }

}
?>