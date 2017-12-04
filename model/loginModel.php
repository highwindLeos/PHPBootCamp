<?php
class LoginModel
{
    protected $db;

    public function __construct(PDO $db) { #생성자 메소드 (클래스를 인스턴스화 할때 반드시 호출)
        $this->db = $db;
    }

    public function getUsersByEmail($email) {

        $selectSql = 'SELECT * FROM users WHERE email = :email';

        $stmt = $this->db->prepare($selectSql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(); 
        
        return $stmt->fetch(PDO::FETCH_ASSOC); #array 1row return.
    }

}
?>